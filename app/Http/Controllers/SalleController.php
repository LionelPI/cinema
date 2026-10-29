<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    // Afficher toutes les salles
    public function index(): JsonResponse
    {
        return response()->json(Salle::all());
    }

    // Afficher une salle précise
    public function show(Salle $salle): JsonResponse
    {
        return response()->json($salle);
    }

    // Ajouter une salle
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:salles,nom',
            'capacite' => 'required|integer|min:1',
            'equipements' => 'nullable|string',
        ]);

        $salle = Salle::create($validated);

        return response()->json($salle, 201);
    }

    // Modifier une salle
    public function update(Request $request, Salle $salle): JsonResponse
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255|unique:salles,nom,' . $salle->id,
            'capacite' => 'sometimes|required|integer|min:1',
            'equipements' => 'sometimes|nullable|string',
        ]);

        $salle->update($validated);

        return response()->json($salle);
    }

    // Supprimer une salle
    public function destroy(Salle $salle): JsonResponse
    {
        $salle->delete();

        return response()->json([
            'message' => 'Salle supprimée avec succès.'
        ]);
    }
}
