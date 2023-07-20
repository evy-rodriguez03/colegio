<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Periodo;

class InicioController extends Controller
{

    public function index(){
        $periodo = periodo::whereDate('fechaInicio', '<=', now())->whereDate('fechaCierre', '>=', now())->first();
        return view::make('periodo', ['periodo' => $periodo]);
    }


    public function create(){

        $periodo = new Periodo();

        return view('Administracion.iniciom', compact('periodo'));
    }

    public function store(Request $request){

        
        $periodo = new Periodo;
        $periodo->fechaInicio = $request->input('fechaInicio');
        $periodo->periodoMatricula = $request->input('periodoMatricula');
        $periodo->fechaCierre = $request->input('fechaCierre');
        $periodo->save();



        //return redirect()->route('creatematricula')
        return redirect()->route('cursos.create')
        ->with('mensaje', 'Se ha iniciado la matrícula exitosamente.');
    }

    
}
