<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Liste des films depuis la base de données
Route::get('/films', function () {
    $films = \Illuminate\Support\Facades\DB::table('films')->get();

    return response()->json($films);
});

// Liste des salles
Route::get('/salles', function () {
    $salles = \Illuminate\Support\Facades\DB::table('salles')->get();

    return response()->json($salles);
});

// Liste des séances
Route::get('/seances', function () {
    $seances = \Illuminate\Support\Facades\DB::table('seances')->get();

    return response()->json($seances);
});

// Liste des réservations
Route::get('/reservations', function () {
    $reservations = \Illuminate\Support\Facades\DB::table('reservations')->get();

    return response()->json($reservations);
});
