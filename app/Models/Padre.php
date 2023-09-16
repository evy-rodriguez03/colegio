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

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_padre', 'padre_id', 'alumno_id');
    }

    public function escolar()
    {
        return $this->belongsToMany(Escolar::class,  'alumno_padre', 'padre_id', 'alumno_id');
    }
}
