<?php

namespace Tests\Unit;

use App\Models\Episode;
use App\Models\Season;
use Tests\TestCase;

class SeasonTest extends TestCase
{
    
    /**@var Season */
    private $season;

    protected function setUp(): void
    {
        parent::setUp();
        $season = new Season();
        $episode1 = new Episode();
        $episode1->assisted = true;
        $episode2 = new Episode();
        $episode2->assisted = false;
        $episode3 = new Episode();
        $episode3->assisted = true;
        $season->episodes->add($episode1);
        $season->episodes->add($episode2);
        $season->episodes->add($episode3);

        $this->season = $season;
    }

    public function testGetEpisodesAssisted()
    {
       $episodesAssisted = $this->season->getEpisodesAssisted();

       $this->assertCount(2, $episodesAssisted);
        foreach ($episodesAssisted as $episode) {
            $this->assertTrue($episode->assisted);
        }
    }

    public function testGetAllEpisodes()
    {
        $episodes = $this->season->episodes;
        $this->assertCount(3, $episodes);
    }
}