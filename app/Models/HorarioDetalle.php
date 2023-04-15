<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDetalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'hora_inicial',
        'hora_final',
        'ampm_inicial',
        'ampm_final',
        'horario_id'
    ];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}