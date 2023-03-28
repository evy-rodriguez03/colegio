<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table = "periodo_i";

    protected $fillable = [
        'fechaInicio',
        'periodoMatricula',
        'usuario',
        'fechaCierre'
    ];

    public function alumno(){
        return $belongsTo('App\Models\Alumno');
    }
}
