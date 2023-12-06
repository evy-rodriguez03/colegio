<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class requisitoController extends Controller
{
    public function create()
    {

        $resultado = Alumno::select(
            DB::raw('(SELECT COUNT(id) FROM alumnos WHERE fotografias IS true) AS fotografiasa'),
            DB::raw('(SELECT COUNT(id) FROM alumnos WHERE fotografiasdelpadre IS true) AS fotografiasp'),
            DB::raw('(SELECT COUNT(id) FROM alumnos WHERE carnet IS true) AS carnet'),
            DB::raw('(SELECT COUNT(id) FROM alumnos WHERE certificadodeconducta IS true) AS certificado')
        )->get();
       $datos = [];
       if (isset($resultado[0]->fotografiasa)) {
            $datos = [
                'fotoa' => $resultado[0]->fotografiasa,
                'fotop' => $resultado[0]->fotografiasp,
                'carnet' => $resultado[0]->carnet,
                'certi' => $resultado[0]->certificado,
            ];
       }

        $jsonDatos = json_encode($datos);
        return view('secretaria/requisito', ['jsonDatos' => $jsonDatos ]);

    }
}
