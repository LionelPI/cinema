<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\SalleController;

// Page d'accueil
Route::view('/', 'cinema');

// Page web des films
Route::get('/films', [FilmController::class, 'pageFilms']);

// Page web des séances
Route::get('/seances', [SeanceController::class, 'pageSeances']);

// Page web des salles
Route::get('/salles', [SalleController::class, 'pageSalles']);
