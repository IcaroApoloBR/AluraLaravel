<?php

use App\Http\Controllers\AnimesController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/animes', [AnimesController::class, 'index'])->name('listAnimes');
Route::get('/animes/criar', [AnimesController::class, 'create'])->middleware('auth');
Route::post('/animes/criar', [AnimesController::class, 'store'])->middleware('auth');
Route::delete('/animes/{id}', [AnimesController::class, 'destroy'])->middleware('auth');
Route::post('/animes/{id}/editarNome', [AnimesController::class, 'editName'])->middleware('auth');

Route::get('/animes/{animeId}/temporadas', [SeasonsController::class, 'index']);

Route::get('/temporadas/{season}/episodios', [EpisodesController::class, 'index']);
Route::post('/temporadas/{season}/episodios/assistir', [EpisodesController::class, 'assisted'])
->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/entrar', [App\Http\Controllers\LoginController::class, 'index']);
Route::post('/entrar', [App\Http\Controllers\LoginController::class, 'login']);
Route::get('/registrar', [App\Http\Controllers\RegisterController::class, 'create']);
Route::post('/registrar', [App\Http\Controllers\RegisterController::class, 'store']);

Route::get('/sair', function() {
    Auth::logout();
    return redirect('/entrar');
});

Route::get('/visualizar-email', function() {
    return new \App\Mail\NewAnime('arrow', 5, 6);
});

Route::get('/enviar-email', function() {
    $email = new App\Mail\NewAnime(
        'Death Note 2',
        qtdSeasons: 2,
        qtdEpisodes: 10
    );

    $email->subject('New anime added to list');

    $user = (object)[
        'email' => 'icaro@teste.com',
        'name' => 'Icaro'
    ];

    \Illuminate\Support\Facades\Mail::to($user)->send($email);
    return 'Email successfully sent';
});