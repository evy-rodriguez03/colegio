<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parientetransporte extends Model
{
    use HasFactory;
    protected $table = "parientetransportes";

    protected $fillable = [
        'nombrecompleto',
        'parentesco',
        'edad',
        'bus',
        'taxi',
        'conelpadre',
        'solo',
    ];
}
