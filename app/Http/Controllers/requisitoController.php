<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requisitoController extends Controller
{
    public function create(){
        return view('secretaria/requisito');
       }

       public function requisitos()
{
    // Recopilar los datos de la base de datos
    $datos = DB::table('alumnos')
        ->select('fotografia', 'fotografia_padre', 'fotografia_carnet', 'certificado_conducta')
        ->get();

    // Crear un array para almacenar los datos de la gráfica
    $graficaDatos = array(
        'fotografia' => 0,
        'fotografia_padre' => 0,
        'fotografia_carnet' => 0,
        'certificado_conducta' => 0
    );

    // Iterar sobre los datos recopilados para contar cada tipo de documento
    foreach ($datos as $dato) {
        $graficaDatos['fotografia'] += $dato->fotografia;
        $graficaDatos['fotografia_padre'] += $dato->fotografia_padre;
        $graficaDatos['fotografia_carnet'] += $dato->fotografia_carnet;
        $graficaDatos['certificado_conducta'] += $dato->certificado_conducta;
    }

    // Pasar los datos a la vista
    return view('secretaria.requisito', compact('graficaDatos'));
}

public function mostrarGrafica()
{
    // Obtener los datos de la base de datos
    $datos = DB::table('students')
                ->select(DB::raw('count(fotografia) as fotografia, count(fotografia_padre) as fotografia_padre, count(fotografia_carnet) as fotografia_carnet, count(certificado_conducta) as certificado_conducta'))
                ->get();
    
    // Pasar los datos a la vista
    return view('secretaria.requisito', ['graficaDatos' => $datos]);
}
}
