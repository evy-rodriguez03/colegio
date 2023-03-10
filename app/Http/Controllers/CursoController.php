<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\Curso;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
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
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cursos = new Curso;
        $cursos->curso = $request->get('curso');
        $cursos->seccion= $request->get('seccion');
        $cursos->horario = $request->get('horario');

        $cursos->save();

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
        $curso = Curso::find($id);
        return view('curso.edit')->with('curso',$curso);
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
            'curso' => 'required',
            'seccion' => 'required',
            'horario' => 'required'
        ]);

        $curso->curso = $request->input('curso');
        $curso->seccion= $request->input('seccion');
        $curso->horario = $request->input('horario');

        $curso->save();

        return redirect()->route('cursos.index', ['curso' => $curso->id]);
    }

    // Redirigir al usuario a la p??gina de detalles del curso actualizado


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        return redirect('/cursos');
    }
}
