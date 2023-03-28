<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = "cursos";

    public function matriculas()
    {
        return $this->hasOne('App\Models\Matriculado');
    }
}
