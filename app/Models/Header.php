<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable =[
        'id',
        'transactionDate'
    ];

    public function detail(){
        return $this->hasMany(Detail::class,'transactionID','transactionID');
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
