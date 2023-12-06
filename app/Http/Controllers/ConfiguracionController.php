<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornada;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('configurar.index');
    }

    public function indexJornada()
    {
        $jornadas = Jornada::all();
        return view('configurar.Jornada.indexJornada', compact('jornadas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createJornada()
    {
        return view('configurar.Jornada.jornada');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
        $validatedData = $request->validate([
            'jornada' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ], [
            'jornada.required' => 'El campo jornada es obligatorio.',
            'jornada.string' => 'El campo jornada debe ser una cadena de texto.',
            'jornada.max' => 'El campo jornada no debe exceder los 255 caracteres.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.string' => 'El campo descripcion debe ser una cadena de texto.',
            'descripcion.max' => 'El campo descripcion no debe exceder los 255 caracteres.',
        ]);

        // Crear una nueva instancia del modelo Jornada y asignar los valores del formulario
        $jornada = new Jornada();
        $jornada->jornada = $validatedData['jornada'];
        $jornada->descripcion = $validatedData['descripcion'];

        // Guardar la jornada en la base de datos
        $jornada->save();

        // Redirigir a la página de índice de jornadas o a donde desees después de guardar
        return redirect()->route('jornada.index'); // Cambia 'jornada.index' por la ruta de tu página de índice de jornadas
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
        $jornada = Jornada::find($id);
        return view('configurar.Jornada.editar', compact('jornada'));
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
            'jornada' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ], [
            'jornada.required' => 'El campo jornada es obligatorio.',
            'jornada.string' => 'El campo jornada debe ser una cadena de texto.',
            'jornada.max' => 'El campo jornada no debe exceder los 255 caracteres.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.string' => 'El campo descripcion debe ser una cadena de texto.',
            'descripcion.max' => 'El campo descripcion no debe exceder los 255 caracteres.',
        ]);

        $jornada = Jornada::find($id);
        $jornada->jornada = $request->input('jornada');
        $jornada->descripcion = $request->input('descripcion');
        $jornada->save();

        return redirect()->route('jornada.index')->with('success', 'Jornada actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jornada = Jornada::find($id);
        $jornada->delete();

        return redirect()->route('jornada.index')->with('success', 'Jornada eliminada exitosamente.');
    }
}
