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
      
        $id_alumnos = $request->input('id_alumno');
        $contador = 0;
        
        foreach ($id_alumnos as $key => $id_alumno) {
            $campo = Consejeria::where('id_alumno','=', $id_alumno)->get();

            if (count($campo) == 0) {
                $campo = new Consejeria;
                $campo->id_alumno = $id_alumno;
                $campo->secretaria = $request->input('secretaria')[$contador] ?? 0;
                $campo->save();
            }else{
                $campo = Consejeria::find($campo[0]->id);
                $campo->id_alumno = $id_alumno;
                $campo->secretaria = $request->input('secretaria')[$contador] ?? 0;
                $campo->save();
                $contador += 1;
            }
      
            return redirect('consejeria/tablaindex');
        }
   
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
