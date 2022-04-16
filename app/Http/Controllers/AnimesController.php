<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimesController extends Controller
{
    public function index(Request $request) {

        $animes = Anime::query()->orderBy('name')->get();
        $message = $request->session()->get('message');
    
       return view('animes.index')->with('animes', $animes, 'message', $message);
    }

    public function create() {

        return view('animes.create');
    }

    public function store(Request $request) {

        $anime = Anime::create($request->all());
        $request = session()
            ->flash(
                'message',"Anime {$anime->id} created successfully {$anime->name}."
            );

        return redirect('/animes');
    }

    public function destroy(Request $request) {
        Anime::destroy($request->id);
        $request = session()
        ->flash(
            'message',"Anime removido com sucesso."
        );

        return redirect('/animes');
    }
}
