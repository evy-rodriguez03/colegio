<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmacontrato extends Model
{
    use HasFactory;
    protected $table = 'firmacontratotesorerias';

     protected $fillable = [
        'id_padre',
        'contrato',
    ];
}
