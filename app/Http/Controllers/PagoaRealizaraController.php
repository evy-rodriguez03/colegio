<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagorealizar;
use App\Models\Alumno;


class PagoaRealizaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view ('tesoreria.pagorealizar',compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pagorealizar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $alumno_id = 1; // Aquí deberías obtener el ID del alumno que está realizando los pagos (puedes pasarlo como parámetro en la URL o ajustar esta lógica según tu necesidad).
        // Guardar el estado de los pagos en la tabla "pagos"
     
        $pagorealizars = new Pagorealizar();
        $pagorealizars->alumno_id = $alumno_id;
        $pagorealizars->mensualidad = $request->input('mensualidad') ? 1 : 0;
        $pagorealizars->pagosadministrativos = $request->input('pagosadministrativos') ? 1 : 0;
        $pagorealizars->bolsaescolar = $request->input('bolsaescolar') ? 1 : 0;
        // Puedes agregar más campos según lo que necesites guardar en la tabla "pagos"
        $pagorealizars->save();

        // Redireccionar a la vista de pagos o mostrar un mensaje de éxito, etc.
        return redirect()->route('pagorealizar.index', $alumno_id)->with('notification', 'Los pagos han sido guardados exitosamente.');
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
