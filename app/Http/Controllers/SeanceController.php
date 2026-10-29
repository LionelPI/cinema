<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Film;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class SeanceController extends Controller
{
    // Afficher toutes les séances avec leur film et leur salle
    public function index(): JsonResponse
    {
        return response()->json(
            Seance::with(['film', 'salle'])->get()
        );
    }

    // Afficher une séance précise
    public function show(Seance $seance): JsonResponse
    {
        return response()->json(
            $seance->load(['film', 'salle'])
        );
    }

    // Ajouter une séance
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'film_id' => ['required', 'integer', 'exists:films,id'],
            'salle_id' => ['required', 'integer', 'exists:salles,id'],
            'date' => ['required', 'date'],
            'heure' => ['required', 'date_format:H:i'],
        ]);

        $this->verifierConflit($validated);

        $seance = Seance::create($validated);

        return response()->json(
            $seance->load(['film', 'salle']),
            201
        );
    }

    // Modifier une séance
    public function update(Request $request, Seance $seance): JsonResponse
    {
        $validated = $request->validate([
            'film_id' => ['sometimes', 'required', 'integer', 'exists:films,id'],
            'salle_id' => ['sometimes', 'required', 'integer', 'exists:salles,id'],
            'date' => ['sometimes', 'required', 'date'],
            'heure' => ['sometimes', 'required', 'date_format:H:i'],
        ]);

        // Fusionner les valeurs actuelles avec les nouvelles valeurs
        $donnees = array_merge($seance->toArray(), $validated);

        $this->verifierConflit($donnees, $seance->id);

        $seance->update($validated);

        return response()->json(
            $seance->load(['film', 'salle'])
        );
    }

    // Vérifier si la salle est déjà occupée pendant ce créneau
    private function verifierConflit(
        array $donnees,
        ?int $seanceId = null
    ): void {
        $film = Film::findOrFail($donnees['film_id']);

        $date = Carbon::parse($donnees['date'])->toDateString();

        $debut = Carbon::parse(
            $date . ' ' . $donnees['heure']
        );

        $fin = $debut->copy()->addMinutes($film->duree);

        $seances = Seance::with('film')
            ->where('salle_id', $donnees['salle_id'])
            ->whereDate('date', $date);

        // Ne pas comparer la séance avec elle-même lors d'une modification
        if ($seanceId !== null) {
            $seances->where('id', '!=', $seanceId);
        }

        foreach ($seances->get() as $existante) {
            $debutExistant = Carbon::parse(
                Carbon::parse($existante->date)->toDateString()
                . ' ' . $existante->heure
            );

            $finExistante = $debutExistant->copy()
                ->addMinutes($existante->film->duree);

            // Deux séances se chevauchent si leurs périodes se croisent
            if (
                $debut->lt($finExistante)
                && $fin->gt($debutExistant)
            ) {
                throw ValidationException::withMessages([
                    'heure' => [
                        'Conflit horaire : cette salle est déjà occupée pendant cette période.'
                    ]
                ]);
            }
        }
    }

    // Supprimer une séance
    public function destroy(Seance $seance): JsonResponse
    {
        $seance->delete();

        return response()->json([
            'message' => 'Séance supprimée avec succès.'
        ]);
    }
}
