<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolardos extends Model
{
    use HasFactory;
    protected $fillable =[
        //f2
        
        
        'nacimientopadre',
        'edadpadre',
        
        'nestudiopadre',
        'profesionpadre',
        'ocupacionpadre',
        
        
        
        'nacimientomadre',
        'edadmadre',
        
        'nestudiomadre',
        'profesionmadre',
        'ocupacionmadre',
        
        
        'nacimientoencargado',
        'edadencargado',
        
        'nestudioencargado',
        'profesionencargado',
        'ocupacionencargado',
        
        'vivescon',
        'especifiquevives',
        'motivo',
        'nmujeres',
        'nhombres',
        'lugarocupado',
        'checkpadrastro',
        'checkmadrastra',
        'otrapersona'

    ];
}
