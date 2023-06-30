<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioescolarseisController extends Controller
{
    public function createescolarseis()
    {
        return view('orientacion.escolar.formularioescolarseis');
    }
}
