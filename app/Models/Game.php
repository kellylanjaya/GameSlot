<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'gameTitle',
        'genreID',
        'gameImage',
        'gameRating',
        'gameDescription',
        'gamePrice'
    ];

    public function genres(){
        return $this->belongsTo(Genre::class,'genreID','id');
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function details(){
        return $this->hasMany(Detail::class);
    }
}
