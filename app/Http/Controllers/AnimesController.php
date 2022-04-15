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
    
        $html = "<ul>";
        foreach($animes as $anime) {
            $html .= "<li>$anime</li>";
        }
        $html .= "</ul>";
    
        return $html;
    }
};
