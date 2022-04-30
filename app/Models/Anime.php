<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Storage;

class Anime extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','picture'];

    public function getPictureUrlAttribute(){
        if($this->picture)
        {
            return FacadesStorage::url($this->picture);
        }
        return FacadesStorage::url('anime/sem-imagem.jpg');
    }

    public function seasons() {
        return $this->hasMany(Season::class);
    }
}
