<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagorealizar extends Model
{
    use HasFactory;
    protected $table = "pagorealizars";

    protected $fillable = [
        'mensualidad',
        'pagosadministrativos',
        'bolsaescolar',
        
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
