<?php

namespace App\Models;
use App\Models\Alumno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retrasada extends Model
{
    use HasFactory;
    protected $table = "retrasadas";
    protected $fillable = [
        'grado',
        'anio',
        'materiaretrasada',
        'total'
 
    ];  

    public function retrasada()
    {
        return $this->hasMany(Alumno::class);
    }
}
