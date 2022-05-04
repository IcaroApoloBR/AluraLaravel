<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewAnime
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nameAnime;
    public $qtdSeasons;
    public $qtdEpisodes;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($nameAnime, $qtdSeasons, $qtdEpisodes)
    {
        $this->nameAnime = $nameAnime;
        $this->qtdSeasons = $qtdSeasons;
        $this->qtdEpisodes = $qtdEpisodes;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
