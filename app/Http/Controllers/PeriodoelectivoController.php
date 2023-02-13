<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriodoelectivoController extends Controller
{
    public function create(){
        return view('periodoelectivo.prinperiodo');
       }
}
