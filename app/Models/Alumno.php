<?php

namespace App\Models;

use App\Models\Padre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\Models\Periodo;

class Alumno extends Model
{
    use HasFactory;
    protected $table = "alumnos";

    protected $fillable = [
        'primernombre',
        'segundonombre',
        'primerapellido',
        'segundoapellido',
        'numerodeidentidad',
        'fechadenacimiento',
        'genero',
        'direccion',
        'numerodehermanosenicgc',
        'tiene_alergia',
        'alergia',
        'fotografias',
        'fotografiasdelpadre',
        'carnet',
        'certificadodeconducta',
        'ciudad',
        'depto',
        'pais',
        'escuelaanterior',
        'totalhermanos',
        'medico',
        'telefonoemergencia',
        'bus',
        'taxi',
        'conpadre',
        'solo',
       

    ];
    public function padres()
    {
        return $this->belongsToMany(Padre::class, 'alumno_padre', 'alumno_id', 'padre_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'matriculados', 'alumno_id', 'curso_id');
    }

        public function periodos()
        {
            return $this->belongsToMany(Periodo::class, 'matriculados', 'alumno_id', 'periodo_id');
        }

        public function pagos()
    {
        return $this->hasMany(PagoRealizar::class, 'alumno_id');
    }
        


}
