<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Anime extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','picture'];

    public function getPictureUrlAttribute(){
        if($this->picture)
        {
            return Storage::url($this->picture);
        }
        return Storage::url('anime/no-image.jpg');
    }

    public function seasons() {
        return $this->hasMany(Season::class);
    }
}
