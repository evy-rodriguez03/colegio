<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;

class Periodo extends Model
{
    use HasFactory;
    protected $table = "periodo_i";

    protected $fillable = [
        'fechaInicio',
        'periodoMatricula',
        'fechaCierre'
    ];

  public function alumnos()
  {
    return $this->belongsToMany(Alumno::class, 'matriculados', 'periodo_id' ,'alumno_id' );
  }

}
