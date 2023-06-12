<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;
    public $fillable = ['numero','saldo','user_id'];
    public $timestamps = false;

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }
}
