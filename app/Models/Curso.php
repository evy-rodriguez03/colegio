<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;

class Curso extends Model
{
    use HasFactory;
    protected $table = "cursos";

    protected $fillable = [
        'curso',
        'descripcion',
        'niveleducativo',
        'seccion',
        'horario'

    ];

    public function matriculas()
    {
        return $this->hasOne('App\Models\Matriculado');
    }
}
