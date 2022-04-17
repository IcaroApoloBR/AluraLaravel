<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimesFormRequest;
use App\Models\Anime;
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

    public function store(AnimesFormRequest $request) {

        $anime = Anime::create(['name' => $request->name]);
        $qtdSeasons = $request->qtd_seasons;
        for ($i = 1; $i <= $qtdSeasons; $i++) {
            $season = $anime->seasons()->create(['number' => $i]);

            for ($j = 1; $j <= $request->episodes_season; $j++) {
                $season->episodes()->create(['number' => $j]);
            }
        }

        $request->session()->flash('message',"Anime {$anime->name} with seasons and episodes created successfully .");

        return redirect('/animes');
    }

    public function destroy(Request $request) {
        Anime::destroy($request->id);
        $request->session()->flash('message',"Anime removed successfully.");

        return redirect('/animes');
    }
}
