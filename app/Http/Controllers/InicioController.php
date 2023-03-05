<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inicio;

class InicioController extends Controller
{
    public function create(){

        return view('Administracion.iniciom');
    }

    public function store(Request $request){

        $inicio = new Inicio;
        $inicio->fecha = $request->input('fecha');
        $inicio->usuario = $request->input('usuario');
        $inicio->save();
    }
}
