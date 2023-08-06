<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    public $fillable = ['acao','valor','data_hora','conta_id'];
    public $timestamps = false;
    
    public function conta() 
    {
        return $this->belongsTo('App\Models\Conta');
    }

}