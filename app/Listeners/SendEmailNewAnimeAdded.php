<?php

namespace App\Listeners;

use App\Events\NewAnime;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailNewAnimeAdded
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
        $qtdSeasons = $event->qtdSeasons;
        $qtdEpisodes = $event->qtdEpisodes;

        $users = User::all();
        foreach($users as $index => $user) 
        {
            $multiple = $index + 1;
            $email = new \App\Mail\NewAnime(
                $nameAnime,
                $qtdSeasons,
                $qtdEpisodes
            );

            $email->subject('New anime added to list');
            $when = now()->addSeconds($multiple * 10);
            \Illuminate\Support\Facades\Mail::to($user)->later($when, $email);
            //sleep(seconds: 5);
        }
    }
}
