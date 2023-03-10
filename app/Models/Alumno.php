<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = "alumnos";

    protected $fillable = [
        'primernombre',
        'segundonombre',
        'telefonodeencargado',
        'primerapellido',
        'segundoapellido',
        'numerodeidentidad',
        'fechadenacimiento',
        'alergia',
        'lugardenacimiento',
        'genero',
        'direccion',
        'numerodehermanosenicgc',
        'fotografias',
        'fotografiasdelpadre',
        'carnet',
        'certificadodeconducta'
    ];
}
