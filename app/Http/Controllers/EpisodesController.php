<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season, Request $request) {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'seasonId' => $season->id,
            'message' => $request->session()->get('message')
        ]);
    }

    public function assisted(Season $season, Request $request) {
        $episodesAssisted = $request->episodes;
        $season->episodes->each(function (Episode $episode)
        use ($episodesAssisted) 
        {
            $episode->assisted = in_array(
                $episode->id,
                $episodesAssisted
            );
        });
        $season->push();
        $request->session()->flash('message', 'Episodes marcados como assistidos');

        return redirect()->back();
    }
}
