<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','picture'];

    public function seasons() {
        return $this->hasMany(Season::class);
    }
}
