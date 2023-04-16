<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccion;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seccions = Seccion::all();
        return view('secretaria.seccion.listasec', compact('seccions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    return view('secretaria.seccion.indexsec');
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
            'descripcion' => 'required',
            'jornada' => 'required',
            'modalidad' => 'required',
            'malla_curricular' => 'required',
        ]);

    $seccion = new Seccion;
    $seccion->descripcion = $request->descripcion;
    $seccion->jornada = $request->jornada;
    $seccion->modalidad = $request->modalidad;
    $seccion->malla_curricular = $request->malla_curricular;
    
    $seccion->save();
    return redirect()->route('secciones.index');
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
