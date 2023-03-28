<?php

namespace App\Models;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    use HasFactory;
    protected $table = "padres";
    public $timestamps = false;
    
    public function alumnos()
{
    return $this->belongsToMany(Alumno::class, 'alumno_padre','alumno_id','padre_id');
}

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
        'ingresos',
        'compromiso'
    ];
}
