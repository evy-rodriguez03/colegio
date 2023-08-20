<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno', 'id', 'id');
    }

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso');
    }
}
