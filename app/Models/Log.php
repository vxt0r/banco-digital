<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    public $fillable = ['acao','valor','conta_id'];
    
    public function conta() 
    {
        return $this->belongsTo('App\Models\Conta');
    }

}