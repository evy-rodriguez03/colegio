<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\Models\Alumno;

class Curso extends Model
{
    use HasFactory;
    protected $table = "cursos";

    protected $fillable = [
       'niveleducativo',
       'modalidad',
       'jornada',
       'seccion',
       'horario'

    ];

    public function alumnos()
{
    return $this->hasMany(Alumno::class);
}


    public function matriculas()
    {
        return $this->hasOne('App\Models\Matriculado');
    }
}
