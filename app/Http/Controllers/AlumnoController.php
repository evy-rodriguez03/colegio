<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('secretaria.alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria.alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
                  'primernombre' => 'required|min:3|string',
                  'segundonombre'=> 'required|min:3|string',
                  'telefonodeencargado'=> 'required|min:8|numeric',
                  'primerapellido'=>'required|min:3|string',
                  'segundoapellido'=>'sometimes|min:3|string',
                  'numerodeidentidad' => 'required|min:13|numeric',
                  'fechadenacimiento'=> 'required|date',
                  'alergia'=> 'required|min:2|string',
                  'lugardenacimiento' => 'required|min:2|string',
                  'genero' => 'required|min:1|string',
                  'direccion'=>'required|string',
                  'numerodehermanosenicgc'=>'required|numeric',
                  'fotografias'=>'sometimes',
                  'fotografiasdelpadre'=>'sometimes',
                  'fotografiacarnet'=>'sometimes',
                  'certificadodeconductadeconducta'=>'sometimes',
        ];
        $messages = [
               'primernombre.required' => 'El primer nombre es requerido.',
               'primernombre.min'=>'El minimo son 3 caracteres.',
               
               'segundonombre.required' => 'El Segundo nombre es requerido.',
               'segundonombre.min'=>'El minimo son 3 caracteres.',
         
               'telefonodeencargado.required'=>'El número de telefono es necesario',
               'telefonodeencargado.min'=>'El numero de telefono tiene un minimo de 8 caracteres',
               'telefonodeencargado.numeric'=>'El número de telefono solo acepta números',
               'primerapellido.required' => 'El primer apellido es requerido.',
               'primerapellido.min'=>'El minimo son 3 caracteres.',
          
               'segundoapellido.min'=>'El minimo son 3 caracteres.',
      
               'numerodeidentidad.required'=> 'El número de identidad es necesario.',
               'numerodeidentidad.min'=> 'El minimo de caracteres del número de identidad es de 13 digitos',
               'numerodeidentidad.numeric'=> 'El campo número de identidad solo permite números',
               'fechadenacimiento.required'=> 'La fecha de nacimiento es necesaria.',
               'fechadenacimiento.date'=>'La fecha es necesaria',
               'alergia.required'=> 'Escriba SI, si tiene alergia; sino escriba NO',
               'alergia.min'=>'Se necesitan 2 caracteres como minimo para alergia',
               'alergia.alpha'=>'Alergia solo acepta letras',
               'genero.required'=>'M=Si es masculino, y F=Si es femenino',
               'genero.min'=>'Es necesario tener al menos 1 caracter en genero',

               'direccion.required'=> 'El campo dirección es necesario',
               'numerodehermanosenicgc.required'=> 'Sino tiene escriba "0"',
               'numerodehermanosenicgc.numeric'=> 'Solo acepta números',
        ];
        $this->validate($request,$rules,$messages);


        Alumno::create(
            $request->only('primernombre','segundonombre','telefonodeencargado','primerapellido','segundoapellido',
            'numerodeidentidad','fechadenacimiento', 'alergia', 'lugardenacimiento', 'genero', 'direccion', 'numerodehermanosenicgc',
            'fotografias','fotografiasdelpadre', 'fotografiacarnet', 'certificadodeconducta' )
            );
 
              return redirect('/alumnos')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $i
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
        $alumnos = Alumno::findOrfail($id);
        $alumnos->delete();

        
        return redirect('/alumnos')->with('eliminar', 'ok');
    }
}
