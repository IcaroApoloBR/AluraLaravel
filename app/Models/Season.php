<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['number'];
    public $timestamps = false;

    public function anime() {
        return $this->belongsTo(Anime::class);
    }

    public function episodes() {
        return $this->hasMany(Episode::class);
    }
}
