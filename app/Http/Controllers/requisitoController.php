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
            DB::raw('(SELECT COUNT(id) FROM alumnos WHERE fotografias IS false) AS fotografiasa'),
            DB::raw('(SELECT COUNT(id) FROM alumnos WHERE fotografiasdelpadre IS false) AS fotografiasp'),
            DB::raw('(SELECT COUNT(id) FROM alumnos WHERE carnet IS false) AS carnet'),
            DB::raw('(SELECT COUNT(id) FROM alumnos WHERE certificadodeconducta IS false) AS certificado')
        )->first();

        $datos = [
            'fotoa' => isset($resultado) ? $resultado->fotografiasa : 0,
            'fotop' => isset($resultado) ? $resultado->fotografiasp : 0,
            'carnet' => isset($resultado) ? $resultado->carnet : 0,
            'certi' => isset($resultado) ? $resultado->certificado : 0,
        ];
        $jsonDatos = json_encode($datos);
        return view('secretaria/requisito', ['jsonDatos' => $jsonDatos ]);
    }
}