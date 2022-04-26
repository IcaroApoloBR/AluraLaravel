<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimesFormRequest;
use App\Models\Anime;
use App\Models\Episode;
use App\Models\Season;
use App\Services\CreateAnime;
use App\Services\RemoveAnime;
use Illuminate\Http\Request;

class AnimesController extends Controller
{
    public function index(Request $request) {

        $animes = Anime::query()->orderBy('name')->get();
        $message = $request->session()->get('message');
    
       return view('animes.index', compact('animes', 'message'));
    }

    public function create() {

        return view('animes.create');
    }

    public function store(
        AnimesFormRequest $request,
        CreateAnime $createAnime) {

        $anime = $createAnime->createAnime(
            $request->name,
            $request->qtd_seasons,
            $request->episodes_season
        );

        $email = new \App\Mail\NewAnime(
            $request->name,
            $request->qtd_seasons,
            $request->episodes_season
        );

        $email->subject('New anime added to list');

        $user = $request->user();
        \Illuminate\Support\Facades\Mail::to($user)->send($email);

        $request->session()->flash('message',"Anime {$anime->name} with seasons and episodes created successfully .");

        return redirect('/animes');
    }

    public function destroy(Request $request, RemoveAnime $removeAnime) {
        $nameAnime = $removeAnime->removeAnime($request->id);
        $request->session()->flash('message',
        "Anime $nameAnime removed successfully."
        );
        return redirect('/animes');
    }

    public function editName(int $id, Request $request) {
        $newName = $request->name;
        $anime = Anime::find($id);
        $anime->name = $newName;
        $anime->save();
    }
}
