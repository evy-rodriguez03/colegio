<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CierreM extends Model
{
    use HasFactory;
    protected $table = "cierre_m_s";

    protected $fillable = [
        'fecha',
        'usuario'
    ];
}
