<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retrasada extends Model
{
    use HasFactory;
    protected $table = "retrasadas";
    public $timestamps = false;
}
