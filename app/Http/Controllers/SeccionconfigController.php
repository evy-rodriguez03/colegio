<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccionconfig;

class SeccionconfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secciones = Seccionconfig::all(); // Cambia el nombre de la variable para evitar conflictos
        return view ('configurar.Seccion.seccionindex', compact('secciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configurar.Seccion.seccion');
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
            'seccion' => 'required',
            'descripcion' => 'required',
        ]);
    
        $seccion= new Seccionconfig();
        $seccion->nombre = $request->input('seccion');
        $seccion->descripcion = $request->input('descripcion');
        $seccion->save();
    
        return redirect()->route('seccionindex.index')->with('success', 'Seccion se ha creado exitosamente.');
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
        $secciones = Seccionconfig::find($id);
        return view('configurar.Seccion.editar', compact('secciones'));
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
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $seccion = Seccionconfig::find($id);
        $seccion->nombre = $request->input('nombre');
        $seccion->descripcion = $request->input('descripcion');
        $seccion->save();

        return redirect()->route('seccionindex.index')->with('success', 'Seccion se ha actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seccion = Seccionconfig::find($id);
        $seccion->delete();

        return redirect()->route('seccionindex.index')->with('success', 'seccion eliminada exitosamente.');
    }
}