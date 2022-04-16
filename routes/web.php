<?php

use App\Http\Controllers\AnimesController;
use Illuminate\Support\Facades\Route;

Route::get('/animes', [AnimesController::class, 'index']);
Route::get('/animes/criar', [AnimesController::class, 'create']);
Route::post('/animes/criar', [AnimesController::class, 'store']);
Route::delete('/animes/{id}', [AnimesController::class, 'destroy']);

