<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        return $this->belongsToMany(Alumno::class, 'matriculados', 'curso_id', 'alumno_id');
    }
    

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($curso) {
            // Verificar si hay alumnos matriculados en este curso
            if ($curso->alumnos()->count() > 0) {
                throw new \Exception("No puedes eliminar este curso porque ya tiene alumnos matriculados.");
            }
        });
    }

    public function escolar()
    {
        return $this->hasOne(Escolar::class);
    }
}
