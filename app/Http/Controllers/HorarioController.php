<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\HorarioDetalle;

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
        return view('secretaria.Horario.horariolista', ['horarios' => $horarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria.horario.horarioc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar datos del formulario

        $request->validate([
            'jornada' => 'required',
            'descripcion' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&\s\-]+$/',
            'horaInicial.*' => 'required',
            'horaFinal.*' => 'required',
            'ampmInicial.*' => 'required',
            'ampmFinal.*' => 'required',
        ]);

        // Obtener datos del formulario
        $jornada = $request->input('jornada');
        $descripcion = $request->input('descripcion');
        $horarios = $request->input('horaInicial');
        $horarios_fin = $request->input('horaFinal');
        $ampm = $request->input('ampmInicial');
        $ampm_fin = $request->input('ampmFinal');

        $contador = 0;
        foreach ($horarios as $value) {
            // Crear objeto de modelo y guardar en la base de datos
            $horario = new Horario();
            $horario->jornada = $jornada;
            $horario->descripcion = $descripcion;
            $horario->hora_inicio = $value;
            $horario->hora_final = $horarios_fin[$contador];
            $horario->save();

            $contador += 1;
        }


        return redirect()->route('horario.index')->with('success', 'Horario agregado correctamente');
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
        $horario = Horario::findOrFail($id);
        return view('secretaria.Horario.horarioedit', compact('horario'));
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
        $horario = Horario::findOrFail($id);

    // Validar datos del formulario
    $request->validate([
        'jornada' => 'required',
        'descripcion' => 'required',
        'hora_inicio' => 'required',
        'hora_final' => 'required',
    ]);

    // Actualizar datos del horario
    $horario->jornada = $request->input('jornada');
    $horario->descripcion = $request->input('descripcion');
    $horario->hora_inicio = $request->input('hora_inicio');
    $horario->hora_final = $request->input('hora_final');
    $horario->save();

    return redirect()->route('horario.index')->with('success', 'Horario actualizado correctamente.');
      }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horarios = Horario::findOrfail($id);
        $horarios->delete();

        return redirect('/horarioc')->with('eliminar', 'ok');
    }
}
