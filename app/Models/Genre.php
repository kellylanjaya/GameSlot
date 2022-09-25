<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'genreTitle'
    ];

    public function games(){
        return $this->hasMany(Game::class,'genreID','id');
    }

}
