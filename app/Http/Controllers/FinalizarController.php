<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinalizarController extends Controller
{
    public function create(){
        return view('administracion.cierrem');
       }
}
