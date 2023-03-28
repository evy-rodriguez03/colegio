<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = 'horarios'; 

    protected $fillable = [
        'jornada',
        'descripcion',
        'hora_inicio',
        'hora_final',
    ];

    public function horas()
    {
        return $this->hasMany(Hora::class);
    }
}
