<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CierreM;

class CierreController extends Controller
{
    public function create(){

        return view('Administracion.cierrem');
    }

    public function store(Request $request){

        $inicio = new CierreM;
        $inicio->fecha = $request->input('fecha');
        $inicio->usuario = $request->input('usuario');
        $inicio->save();
    }
}
