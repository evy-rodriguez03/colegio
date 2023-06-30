<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consejeria extends Model
{
    use HasFactory;
    protected $table = 'consejerias';

    protected $fillable = [
       'secretaria',
       'orientacion',
       'consejeria',
       'tesoreria',
       'ultimo',

   ];

       // Relación uno a uno inversa con el modelo Alumno
       public function alumno()
       {
           return $this->belongsTo(Alumno::class, 'alumno_id');
       }
       
       

}
