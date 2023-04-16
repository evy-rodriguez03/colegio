<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmacompromiso extends Model
{
    use HasFactory;
     protected $table = 'firmacompromisos';

     protected $fillable = [
        'compromiso',

    ];

 
}
