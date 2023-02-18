<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IniciomController extends Controller
{
    public function create(){
        return view('administracion.iniciom');
       }
}
