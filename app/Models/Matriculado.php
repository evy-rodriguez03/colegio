<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculado extends Model
{
    use HasFactory;

    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno');
    }

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso');
    }

    public function escolar()
    {
        return $this->hasOne(Escolar::class);
    }
}
