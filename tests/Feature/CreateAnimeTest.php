<?php

namespace Tests\Feature;

use App\Models\Anime;
use App\Services\CreateAnime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAnimeTest extends TestCase
{
    use RefreshDatabase;
    
    public function testCreateAnime()
    {
        $createAnime = new CreateAnime();
        $nameAnime = 'Name Test 2.0';
        $animeCreated = $createAnime->createAnime($nameAnime, qtdSeasons:1, episodes_season:1);

        $this->assertInstanceOf(Anime::class, $animeCreated);
        $this->assertDatabaseHas('animes', ['name' => $nameAnime]);
        $this->assertDatabaseHas('seasons', ['anime_id' => $animeCreated->id, 'number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}
