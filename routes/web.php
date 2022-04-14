<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animes', function () {
    $animes = [
        'Death Note',
        'Jujutsu Kaisen',
        'Demon Slayer'
    ];

    $html = "<ul>";
    foreach($animes as $anime) {
        $html .= "<li>$anime</li>";
    }
    $html .= "</ul>";

    return $html;
});
