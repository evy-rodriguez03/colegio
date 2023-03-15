<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    use HasFactory;
    protected $table = "padres";
    protected $fillable = [
        'tipo',
        'primernombre',
        'segundonombre',
        'primerapellido',
        'segundoapellido',
        'numerodeidentidad',
        'telefonopersonal', 
        'lugardetrabajo',
        'oficio',
        'telefonooficina',
        'ingresos'
    ];
}
