<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Curso;
use App\Models\Alumno;
use App\Models\Periodo;
use App\Models\Grado;
use App\Models\Horario;
use App\Models\Modalidad;
use App\Models\Jornada;
use App\Models\Seccionconfig;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodo = Periodo::where('activo','=',1)->first();
        $cursos = Curso::where('idperiodo', '=', isset($periodo->id) ? $periodo->id : 0)
        ->with('alumnos')// Eager load the students relationship
        ->get();
        return view('curso.index')->with('cursos',$cursos);
    }

    public function pdf(){
        $cursos=Curso::All();
        $pdf = Pdf::loadView('curso.cursopdf', compact('cursos'));
        return $pdf->stream();
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::all();
        $modalidades = Modalidad::all();
        $jornadas = Jornada::all();
        $secciones = Seccionconfig::all();
        $horarios = Horario::all();
        return view('curso.create', compact('grados', 'modalidades', 'jornadas', 'secciones', 'horarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'niveleducativo' => 'required',
            'modalidad' => 'required',
            'jornada' => 'required',
            'seccion' => 'required',
            'horario' => 'required'
        ]);
    
        // Creación del nuevo registro en la base de datos
        $curso = new Curso();
        $curso->niveleducativo = $request->input('niveleducativo');
        $curso->modalidad = $request->input('modalidad');
        $curso->jornada = $request->input('jornada');
        $curso->seccion = $request->input('seccion');
        $curso->horario = $request->input('horario');
        $curso->idperiodo = Periodo::where('activo','=',1)->get('id')[0]->id;
        $curso->save();

        return redirect('/cursos');
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
        $grados = Grado::all();
        $modalidades = Modalidad::all();
        $jornadas = Jornada::all();
        $secciones = Seccionconfig::all();
        $horarios = Horario::all();
        $curso = Curso::find($id);
        return view('curso.edit', compact('grados', 'modalidades', 'jornadas', 'secciones', 'horarios'))->with('curso',$curso);
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
        $curso = Curso::findOrFail($id);

        $request->validate([
            'niveleducativo' => 'required',
            'modalidad' => 'required',
            'jornada' => 'required',
            'seccion' => 'required',
            'horario' => 'required'
        ]);

        $curso->niveleducativo = $request->input('niveleducativo');
        $curso->seccion= $request->input('modalidad');
        $curso->horario = $request->input('jornada');
        $curso->seccion = $request->input('seccion');
        $curso->horario = $request->input('horario');

        $curso->save();

        return redirect()->route('cursos.index', ['curso' => $curso->id]);
    }

    // Redirigir al usuario a la página de detalles del curso actualizado


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $curso = Curso::findOrFail($id);
            $curso->delete();
            return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('cursos.index')->with('error', 'No se pudo eliminar el curso: ' . $e->getMessage());
        }
    }
}
