<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class FilmController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Film::all());
    }

    public function show(Film $film): JsonResponse
    {
        return response()->json($film);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duree' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'date_sortie' => 'nullable|date',
            'affiche' => 'nullable|string|max:255',
        ]);

        $film = Film::create($validated);

        return response()->json($film, 201);
    }

    public function update(Request $request, Film $film): JsonResponse
    {
        $validated = $request->validate([
            'titre' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string|max:255',
            'duree' => 'sometimes|required|integer|min:1',
            'description' => 'sometimes|nullable|string',
            'date_sortie' => 'sometimes|nullable|date',
            'affiche' => 'sometimes|nullable|string|max:255',
        ]);

        $film->update($validated);

        return response()->json($film);
    }

    public function destroy(Film $film): JsonResponse
    {
        $film->delete();

        return response()->json([
            'message' => 'Film supprimé avec succès.'
        ]);
    }
}
