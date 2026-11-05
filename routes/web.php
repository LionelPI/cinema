
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

// Page d'accueil
Route::view('/', 'cinema');

// Page web des films
Route::get('/films', [FilmController::class, 'pageFilms']);
