<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;
    public $fillable = ['despesa','valor','user_id'];
    public $timestamps = false;
    
    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

}
