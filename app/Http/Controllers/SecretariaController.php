<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consejeria;
use App\Models\Alumno;
use Barryvdh\DomPDF\Facade\Pdf;


class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('consejeria.tablaindex', compact('alumnos'));
    }

    public function pdf()
    {
        $alumnos = Alumno::all();
        $consejerias = Consejeria::whereIn('id_alumno', $alumnos->pluck('id'))->get()->keyBy('id_alumno');
        $pdf = Pdf::loadView('consejeria.consejeriapdf', compact('alumnos', 'consejerias'));
        return $pdf->stream();
    }

    public function create($id)
    {
        $alumno = Alumno::findOrFail($id);
        $consejerias = Consejeria::whereIn('id_alumno', $alumno->pluck('id'))->get()->keyBy('id_alumno');
        return view('consejeria.consjindex', compact('alumno', 'consejerias'));
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
            'id_alumno' => 'required|integer',
        ], [
            'id_alumno.required' => 'El ID del alumno es obligatorio.',
            'id_alumno.integer' => 'El ID del alumno debe ser numérico.',
        ]);

        // Recupera los valores de los checkboxes del formulario
        $alumno = $request->input('id_alumno');
        $secretaria = $request->input('secretaria') ? 1 : 0;
        $orientacion = $request->input('orientacion') ? 1 : 0;
        $consej = $request->input('consej') ? 1 : 0;
        $tesoreria = $request->input('tesoreria') ? 1 : 0;
        $secultimo = $request->input('secultimo') ? 1 : 0;


        $registro_existente = Consejeria::where('id_alumno', $alumno)->count();
        if ($registro_existente > 0) {
            //Actualizar registro Consejeria del alumno
            $consejeria = Consejeria::where('id_alumno', $alumno)->first();

            // Asigna los valores de los checkboxes al modelo
            $consejeria->secretaria = $secretaria;
            $consejeria->orientacion = $orientacion;
            $consejeria->consej = $consej;
            $consejeria->tesoreria = $tesoreria;
            $consejeria->secultimo = $secultimo;

            // Guarda el modelo en la base de datos
            $consejeria->save();
        } else {
            //Crear registro nuevo en Consejeria del alumno

            // Crea una nueva instancia del modelo Consejeria
            $consejeria = new Consejeria();

            // Asigna los valores de los checkboxes al modelo
            $consejeria->secretaria = $secretaria;
            $consejeria->orientacion = $orientacion;
            $consejeria->consej = $consej;
            $consejeria->tesoreria = $tesoreria;
            $consejeria->secultimo = $secultimo;

            // Guarda el modelo en la base de datos
            $consejeria->id_alumno = $alumno;
            $consejeria->save();
        }


        // Redirige a la página o realiza alguna acción adicional
        return redirect('/tablaindex');
    }

    // ...

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
