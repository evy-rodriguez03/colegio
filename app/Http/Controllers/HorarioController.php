<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario; 

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::all();
        return view('secretaria.Horario.horarioc', ['horarios' => $horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horario.create');
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
            'jornada' => 'required',
            'descripcion' => 'required',
            'horas' => 'required|array',
            'horas.*.horaInicial' => 'required',
            'horas.*.horaFinal' => 'required',
            'horas.*.ampmInicial' => 'required',
            'horas.*.ampmFinal' => 'required',
        ]);


        Horario::create([
            'jornada' => 'required',
            'descripcion' => 'required|alpha',
            'hora_inicio' => $request->input('hora_inicio'),
            'hora_final' => $request->input('hora_final'),
        ]);

        return redirect()->route('secretaria.Horario.horarioc')->with('success', 'Horario creado correctamente.');
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
