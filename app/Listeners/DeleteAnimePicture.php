<?php

namespace App\Listeners;

use App\Events\DeleteAnime;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteAnimePicture
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
     * @param  \App\Events\DeleteAnime  $event
     * @return void
     */
    public function handle(DeleteAnime $event)
    {
        $anime = $event->anime;
        if($anime->picture){
            Storage::delete($anime->picture);
        }
    }
}
