<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IniciomController extends Controller
{
    public function index(){
        return view('administracion.iniciom');
       }
}
