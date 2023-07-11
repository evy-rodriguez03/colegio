<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioescolarsieteController extends Controller
{
    public function createescolarsiete()
    {
        return view('orientacion.escolar.formularioescolarsiete');
    }
}
