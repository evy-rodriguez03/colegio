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
        $inicio->fechaInicio = $request->input('fechaInicio');
        $inicio->periodoMatricula = $request->input('periodoMatricula');
        $inicio->usuario = $request->input('usuario');
        $inicio->fechaCierre = $request->input('fechaCierre');
        $inicio->save();

        return redirect('/iniciom')
        ->with('mensaje', 'Se ha iniciado la matricula exitosa mente.');
    }
}
