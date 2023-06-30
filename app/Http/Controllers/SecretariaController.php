<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consejeria;
use App\Models\Alumno ;


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
        return view('consejeria.tablaindex',compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::all();
    
        foreach ($alumnos as $key => $value) {
            $value->campo = Consejeria::where('id_alumno','=',$value->id)->get();
            $value->valor = Consejeria::where('id_alumno','=',$value->id)->get();
            $value->consejo = Consejeria::where('id_alumno','=',$value->id)->get();
            $value->dinero = Consejeria::where('id_alumno','=',$value->id)->get();
            $value->sector = Consejeria::where('id_alumno','=',$value->id)->get();
        }
        
        return view('consejeria.consjindex')->with('alumnos', $alumnos); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       // Recupera los valores de los checkboxes seleccionados
       $secretaria = $request->input('secretaria');
       $orientacion = $request->input('orientacion');
       $consejeria = $request->input('consejeria');
       $tesoreria = $request->input('tesoreria');
       $sec = $request->input('sec');

       // Obtén todos los alumnos
       $alumnos = Alumno::all();

       // Itera sobre los alumnos y guarda los valores en la base de datos
       foreach ($alumnos as $alumno) {
           // Guarda los valores de los checkboxes en la tabla correspondiente (asumiendo que hay una tabla para cada campo)
           if (isset($secretaria)) {
               $alumno->consejeria()->updateOrCreate(
                   ['alumno_id' => $alumno->id],
                   ['secretaria' => true]
               );
           } else {
               $alumno->consejeria()->updateOrCreate(
                   ['alumno_id' => $alumno->id],
                   ['secretaria' => false]
               );
           }

           // Repite el proceso para los demás campos (orientacion)
           if (isset($orientacion)) {
               $alumno->consejeria()->updateOrCreate(
                   ['alumno_id' => $alumno->id],
                   ['orientacion' => true]
               );
           } else {
               $alumno->consejeria()->updateOrCreate(
                   ['alumno_id' => $alumno->id],
                   ['orientacion' => false]
               );
           }

           // Repite el proceso para los demás campos (consejeria, tesoreria, sec)
           if (isset($consejeria)) {
            $alumno->consejeria()->updateOrCreate(
                ['alumno_id' => $alumno->id],
                ['consejeria' => true]
            );
        } else {
            $alumno->consejeria()->updateOrCreate(
                ['alumno_id' => $alumno->id],
                ['consejeria' => false]
            );
        }
         // Repite el proceso para los demás campos (tesoreria, sec)
         if (isset($tesoreria)) {
            $alumno->consejeria()->updateOrCreate(
                ['alumno_id' => $alumno->id],
                ['tesoreria' => true]
            );
        } else {
            $alumno->consejeria()->updateOrCreate(
                ['alumno_id' => $alumno->id],
                ['tesoreria' => false]
            );
        }
          // Repite el proceso para los demás campos (sec)
          if (isset($sec)) {
            $alumno->consejeria()->updateOrCreate(
                ['alumno_id' => $alumno->id],
                ['sec' => true]
            );
        } else {
            $alumno->consejeria()->updateOrCreate(
                ['alumno_id' => $alumno->id],
                ['sec' => false]
            );
        }
       }

       // Redirige o muestra una respuesta adecuada después de guardar los valores
       return redirect()->back()->with('notification', 'Los valores de los checkboxes se han guardado correctamente.');

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
