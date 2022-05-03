<?php

namespace App\Services;

use App\Events\DeleteAnime;
use App\Models\{Anime, Season, Episode};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RemoveAnime {
    public function removeAnime(int $animeId): string {
        $nameAnime = '';
        DB::transaction(function () use($animeId, &$nameAnime){
            $anime = Anime::find($animeId);
            $animeObj = $anime->toArray();
            dd($anime,$animeObj);
            $nameAnime = $anime->name;

            $this->removeSeasons($anime);
            $anime->delete();

            $event = new DeleteAnime($animeObj);
            event($event);
        });

        return $nameAnime;
    }

    private function removeSeasons(Anime $anime): void {
        $anime->seasons->each(function (Season $season) {
            $this->removeEpisodes($season);    
            $season->delete();
        });
    }
    
    private function removeEpisodes(Season $season): void {
        $season->episodes->each(function (Episode $episode) {
            $episode->delete();
        });
    }
}