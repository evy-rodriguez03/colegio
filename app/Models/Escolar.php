<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolar extends Model
{
    use HasFactory;
    protected $fillable = [
        'eprimerapellido',
        'esegundoapellido',
        'eprimernombre',
        'esegundonombre',
        'enumerodeidentidad',
        'egrado',
        'enumerodecelular',
        'elugardenacimiento',
        'efechadenacimiento',
        'eedad',
        'procedencia',
        'tiempolectivo',
        'telelectivo',
        'noelectivo',
        'telnoelectivo',
        'observaciones'

    ];
}
