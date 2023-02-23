<?php

namespace App\Http\Controllers;

use App\Models\Padre;
use Illuminate\Http\Request;

class PadreController extends Controller
{
    public function index()
    {
        $padres = Padre::all();
        return view('secretaria.tabla_padre', compact('padres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria.datos_padre');
    }

    public function sendData(Request $request){
        $rules = [
            'tipo' => 'required',
            'primernombre' => 'required',
            'segundonombre'=> 'required',
            'numerodeidentidad'=> 'required',
            'telefonopersonal'=> 'required',
            'lugardetrabajo'=> 'required',
            'oficio'=> 'required',
            'telefonooficina'=> 'required',
            'ingresos'=> 'required',
        ];

        

        $this->validate($request, $rules);


        $padres = new Padre();
        $padres->tipo = $request->input('tipo');
        $padres->primernombre = $request->input('primernombre');
        $padres->segundonombre = $request->input('segundonombre');
        $padres->numerodeidentidad = $request->input('numerodeidentidad');
        $padres->telefonopersonal = $request->input('telefonopersonal');
        $padres->lugardetrabajo = $request->input('lugardetrabajo');
        $padres->oficio = $request->input('oficio');
        $padres->telefonooficina = $request->input('telefonooficina');
        $padres->ingresos = $request->input('ingresos');
        $padres->save();
        $notification = 'El padre se ha creado correctamente';

        return redirect('/padres')->with(compact('notification'));

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
    public function edit(Padre $padres)
    {
       
        return view('secretaria.datos_padre.edit', compact('padres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Padre $padres )
    {
        $rules = [
            'tipo' => 'required',
            'primernombre' => 'required',
            'segundonombre'=> 'required',
            'numerodeidentidad'=> 'required',
            'telefonopersonal'=> 'required',
            'lugardetrabajo'=> 'required',
            'oficio'=> 'required',
            'telefonooficina'=> 'required',
            'ingresos'=> 'required',
        ];

        $this->validate($request, $rules);


        $padres->tipo = $request->input('tipo');
        $padres->primernombre = $request->input('primernombre');
        $padres->segundonombre = $request->input('segundonombre');
        $padres->numerodeidentidad = $request->input('numerodeidentidad');
        $padres->telefonopersonal = $request->input('telefonopersonal');
        $padres->lugardetrabajo = $request->input('lugardetrabajo');
        $padres->oficio = $request->input('oficio');
        $padres->telefonooficina = $request->input('telefonooficina');
        $padres->ingresos = $request->input('ingresos');
        $padres->save();
        $notification = 'El padre se ha editado correctamente';

        return redirect('/padres')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Padre $padres)
    {
        $padres->delete();
        $deletename = $padres->nombre;
        $notification = 'El padre '.$deletename.' ha eliminado correctamente';
        return redirect('/padres')->with(compact('notification'));
    }
}
