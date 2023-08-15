<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Matriculado;
use App\Models\Periodo;
use App\Models\Proceso;
class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        
        Artisan::call('periodo:verificar-estado');

        if ($request->input('no_matriculado')){
        $periodos = Periodo::where('activo','=',1)->first();
        $alumnos_no_matriculado = Proceso::where('matriculado','=','no')->get();
        $alumnos = Alumno::with('cursos')->paginate(10);
        $cursos = Curso::pluck('niveleducativo', 'modalidad');
        }
        else {
        $periodos = Periodo::where('activo','=',1)->first();
        $alumnos = Matriculado::where('periodo_id','=',isset($periodos->id)?$periodos->id:0)->with('alumno','curso')->paginate(10);
        $cursos = Curso::where('idperiodo','=',isset($periodos->id)?$periodos->id:0)->pluck('niveleducativo', 'modalidad');  
        }

        $periodoActivo = Periodo::whereActivo(1)->count();

        if ($periodoActivo == 0) {
            return view('Administracion.iniciom');
        }
        return view('secretaria.matricula.principal', compact('alumnos', 'cursos', 'periodos', 'periodoActivo'));
    }

    public function cancelarPeriodo($id)
   {
    $periodo = Periodo::findOrFail($id);

    if ($periodo->activo) {
        $periodo->activo = false;
        $periodo->save();
        // Puedes realizar otras acciones o mostrar un mensaje de éxito aquí
    } else {
        // El periodo ya está cerrado, puedes mostrar un mensaje de error o redirigir a otra página
    }

    // Redireccionar a la página principal o a otra página adecuada
    return redirect()->route('periodo');
}

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria/matricula/principal');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
