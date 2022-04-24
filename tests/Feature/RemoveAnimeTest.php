<?php

namespace Tests\Feature;

use App\Services\CreateAnime;
use App\Services\RemoveAnime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemoveAnimeTest extends TestCase
{
    use RefreshDatabase;
    /**@var Anime */
    private $anime;
    protected function setUp(): void 
    {
        parent::setUp();
        $createAnime = new CreateAnime();
        $this->anime = $createAnime->createAnime(nameAnime: 'Name of Anime', qtdSeasons:1, episodes_season:1);
    }

    public function testRemoveAnime()
    {
        $this->assertDatabaseHas('animes', ['id' => $this->anime->id]);
        $removeAnime = new RemoveAnime();
        $nameAnime = $removeAnime->removeAnime($this->anime->id);
        $this->assertIsString($nameAnime);
        $this->assertEquals('Name of Anime', $this->anime->name);
        $this->assertDatabaseMissing('animes', ['id' => $this->anime->id]);
    }
}
