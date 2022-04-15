<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimesController extends Controller
{
    public function index() {
        $animes = [
            'Death Note',
            'Jujutsu Kaisen',
            'Demon Slayer'
        ];
    
       return view('animes.index')->with('animes', $animes);
    }

    public function create() {
        return view('animes.create');
    }
};
