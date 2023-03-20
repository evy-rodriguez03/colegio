<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class InicioController extends Controller
{
    public function create(){

        return view('Administracion.iniciom');
    }

    public function store(Request $request){

        $periodo = new Periodo;
        $periodo->fechaInicio = $request->input('fechaInicio');
        $periodo->periodoMatricula = $request->input('periodoMatricula');
        $periodo->usuario = $request->input('usuario');
        $periodo->fechaCierre = $request->input('fechaCierre');
        $periodo->save();

        return redirect('/iniciom')
        ->with('mensaje', 'Se ha iniciado la matricula exitosa mente.');
    }
}
