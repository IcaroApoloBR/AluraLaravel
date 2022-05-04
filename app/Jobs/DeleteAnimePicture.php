<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeleteAnimePicture implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $anime;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($anime)
    {
        $this->anime = $anime;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $anime = $this->anime;
        if($anime->picture){
            Storage::delete($anime->picture);
        }
    }
}
