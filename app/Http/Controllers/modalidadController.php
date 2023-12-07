<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modalidad;


class modalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $modalidades = Modalidad::all(); // Cambia el nombre de la variable para evitar conflictos
    return view('configurar.Modalidad.modalidadIndex', compact('modalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidades = Modalidad::all();
        return view('configurar.Modalidad.modalidad');
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
        'modalidad' => 'required|string|max:255',
        'descripcion' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&\s\-]+$/',

    ], [
        'modalidad.required' => 'El campo modalidad es obligatorio.',
        'modalidad.string' => 'El campo modalidad debe ser una cadena de texto.',
        'modalidad.max' => 'El campo modalidad no debe exceder los 255 caracteres.',
        'descripcion.required' => 'El campo descripción es obligatorio.',
        'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
        'descripcion.max' => 'El campo descripción no debe exceder los 255 caracteres.',
    ]);

    $modalidad = new Modalidad();
    $modalidad->nombre = $request->input('modalidad');
    $modalidad->descripcion = $request->input('descripcion');
    $modalidad->save();

    return redirect()->route('modalidad.index')->with('success', 'Modalidad se ha creado exitosamente.');
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
        $modalidades = Modalidad::find($id);
        return view('configurar.Modalidad.modalidadEdit', compact('modalidades'));
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no debe exceder los 255 caracteres.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
            'descripcion.max' => 'El campo descripción no debe exceder los 255 caracteres.',
        ]);

        $modalidad = Modalidad::find($id);
        $modalidad->nombre = $request->input('nombre');
        $modalidad->descripcion = $request->input('descripcion');
        $modalidad->save();

        return redirect()->route('modalidad.index')->with('success', 'Modalidad se ha creado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modalidad = Modalidad::find($id);

        if (!$modalidad) {
            return redirect()->route('modalidad.index')->with('error', 'Modalidad no encontrado.');
        }
        $modalidad->delete();

        return redirect()->route('modalidad.index')->with('success', 'Modalidad eliminado exitosamente.');
    }
}
