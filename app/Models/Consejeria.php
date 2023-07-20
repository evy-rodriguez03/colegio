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
       'consej',
       'tesoreria',
       'secultimo',

   ];    

}
