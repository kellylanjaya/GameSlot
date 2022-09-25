<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;
    const UPDATED_AT = null;

    protected $fillable =[
        'id',
        'transactionDate'
    ];

    public function user(){
        return $this->belongsTo(User::class);

    }
    public function transaction_detail(){
        return $this->hasOne(TransactionDetail::class);
    }
}
