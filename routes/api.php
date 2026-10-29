
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SeanceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes des films
Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/{film}', [FilmController::class, 'show']);
Route::post('/films', [FilmController::class, 'store']);
Route::put('/films/{film}', [FilmController::class, 'update']);
Route::patch('/films/{film}', [FilmController::class, 'update']);
Route::delete('/films/{film}', [FilmController::class, 'destroy']);

// Routes des salles
Route::get('/salles', [SalleController::class, 'index']);
Route::get('/salles/{salle}', [SalleController::class, 'show']);
Route::post('/salles', [SalleController::class, 'store']);
Route::put('/salles/{salle}', [SalleController::class, 'update']);
Route::patch('/salles/{salle}', [SalleController::class, 'update']);
Route::delete('/salles/{salle}', [SalleController::class, 'destroy']);

// Routes des séances
Route::get('/seances', [SeanceController::class, 'index']);
Route::get('/seances/{seance}', [SeanceController::class, 'show']);
Route::post('/seances', [SeanceController::class, 'store']);
Route::put('/seances/{seance}', [SeanceController::class, 'update']);
Route::patch('/seances/{seance}', [SeanceController::class, 'update']);
Route::delete('/seances/{seance}', [SeanceController::class, 'destroy']);

// Réservations : consultation uniquement pour le moment
Route::get('/reservations', function () {
    return response()->json(
        \Illuminate\Support\Facades\DB::table('reservations')->get()
    );
});
