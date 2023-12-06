<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagorealizar;
use App\Models\Alumno;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PagoaRealizaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alumno = Alumno::leftJoin('pagorealizars','pagorealizars.alumno_id','=','alumnos.id')
        ->select('alumnos.*','pagorealizars.mensualidad','pagorealizars.pagosadministrativos','pagorealizars.bolsaescolar')
        ->where('alumnos.id',$request['id_alumno'])
        ->first();
        Log::info($alumno);
        return view ('tesoreria.pagorealizar', compact('alumno'));
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
    $alumno_id = $request['id_alumno'];
    
    // Verificar si ya existe un registro para el alumno en la tabla "pagos"
    $pagosExistente = Pagorealizar::where('alumno_id', $alumno_id);
    if ($pagosExistente->count() > 0) {
        //Si existe un registro lo actualiza   
        $pagosExistente->update([
            'mensualidad' => $request->input('mensualidad') ? 1 : 0,
            'pagosadministrativos' => $request->input('pagosadministrativos') ? 1 : 0,
            'bolsaescolar' => $request->input('bolsaescolar') ? 1 : 0,
        ]);
    }else{
        // Si no existe un registro, crea uno nuevo
    $pagorealizars = new Pagorealizar();
    $pagorealizars->alumno_id = $alumno_id;
    $pagorealizars->mensualidad = $request->input('mensualidad') ? 1 : 0;
    $pagorealizars->pagosadministrativos = $request->input('pagosadministrativos') ? 1 : 0;
    $pagorealizars->bolsaescolar = $request->input('bolsaescolar') ? 1 : 0;
    // Puedes agregar más campos según lo que necesites guardar en la tabla "pagos"
    $pagorealizars->save();
    }

    // Redireccionar a la vista de pagos o mostrar un mensaje de éxito, etc.
    return redirect()->route('vistapago.index', $alumno_id)->with('notification', 'Los pagos han sido guardados exitosamente.');
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
