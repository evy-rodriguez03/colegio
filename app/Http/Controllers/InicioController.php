<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Periodo;

class InicioController extends Controller
{

    public function index(){
        $periodo = Periodo::whereDate('fechaInicio', '<=', now())->whereDate('fechaCierre', '>=', now())->first();
        return view::make('periodo', ['periodo' => $periodo]);
    }


    public function create(){

        return view('Administracion.iniciom');
    }

    public function store(Request $request){

        
        $periodo = new Periodo;
        $periodo->fechaInicio = $request->input('fechaInicio');
        $periodo->periodoMatricula = $request->input('periodoMatricula');
        $periodo->fechaCierre = $request->input('fechaCierre');
        $periodo->save();

        return redirect()->route('creatematricula')
        ->with('mensaje', 'Se ha iniciado la matrícula exitosamente.');
    }

    
}
