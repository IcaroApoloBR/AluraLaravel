<?php

use App\Http\Controllers\AnimesController;
use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Route;

Route::get('/animes', [AnimesController::class, 'index']);
Route::get('/animes/criar', [AnimesController::class, 'create']);
Route::post('/animes/criar', [AnimesController::class, 'store']);
Route::delete('/animes/{id}', [AnimesController::class, 'destroy']);
Route::post('/animes/{id}/editarNome', [AnimesController::class, 'editarNome']);

Route::get('animes/{animeId}/temporadas', [SeasonsController::class, 'index']);

