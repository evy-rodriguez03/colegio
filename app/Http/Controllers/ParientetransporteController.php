<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParientetransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('secretaria.matricula.parientetransporte');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rules =[
                  'nombrecompleto'=>'required|min:3|string',
                  'parentesco'=>'required|min:3|string',
                  'edad'=>'required|string',
                  'bus'=>'sometimes',
                  'taxi'=>'sometimes',
                  'conelpadre'=>'sometimes',
                  'solo'=>'sometimes',
        ];

        $messages = [
            'nombrecompleto.required' => 'El primer nombre es requerido.',
            'nombrecompleto.min'=>'El minimo son 3 caracteres.',
            'parentesco.required' => 'El primer nombre es requerido.',
            'parentesco.min'=>'El minimo son 3 caracteres.',
            'edad.required'=>'La edad es requerido',
            'bus' => 'Necesita seleccionar',
            'taxi' => 'Necesita seleccionar',
            'conelpadre' => 'Necesita seleccionar',
            'solo' => 'Necesita seleccionar',
        ];
        $this->validate($request,$rules,$messages);
        Pagorealizar::create(
            $request->only('nombrecompelto', 'parentesco','edad','bus','taxi','conelpadre','solo' )
            );
 
              return redirect('/Parientetransporte.')->with('success', '¡El dato ha sido guardado');
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
