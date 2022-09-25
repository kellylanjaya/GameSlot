<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function game(){
        return $this->belongsTo(Game::class,'gameID','id');

    }

    public function Header(){
        return $this->belongsTo(Header::class);
    }
}
