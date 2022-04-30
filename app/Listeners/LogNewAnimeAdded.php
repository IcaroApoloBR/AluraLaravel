<?php

namespace App\Listeners;

use App\Events\NewAnime;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogNewAnimeAdded implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewAnime  $event
     * @return void
     */
    public function handle(NewAnime $event)
    {
        $nameAnime = $event->nameAnime;
        \Log::info('New Anime Added to List '. $nameAnime);
    }
}
