<?php

namespace App\Http\Controllers;

use App\Models\Retrasada;
use Illuminate\Http\Request;

class RetrasadaController extends Controller
{
    public function index()
    {
        $retrasadas = Retrasada::all();
        return view('tesoreria.retrasada', compact('retrasadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tesoreria.form_retrasadas');
    }

    public function sendData(Request $request){
        $rules = [
            'primernombre' => 'required|alpha',
            'segundonombre'=> 'required|alpha',
            'primerapellido' => 'required|alpha',
            'segundoapellido'=> 'required|alpha',
            'grado'=> 'required|alpha',
            'anio'=> 'required|min:4|numeric',
            'materiaretrasada'=> 'required|alpha',
            'total'=> 'required|numeric',
        ];

        $messages= [
            'total.numeric' => 'El total a pagar debe inculir solo números',
            'anio.min'=> 'El Año debe incluir al menos 4 digitos',
            'anio.numeric'=> 'El Año debe incluir solo valores numéricos',
           ];

        $this->validate($request, $rules, $messages);


        $retrasadas = new Retrasada();
        $retrasadas->primernombre = $request->input('primernombre');
        $retrasadas->segundonombre = $request->input('segundonombre');
        $retrasadas->primerapellido = $request->input('primerapellido');
        $retrasadas->segundoapellido = $request->input('segundoapellido');
        $retrasadas->grado = $request->input('grado');
        $retrasadas->anio = $request->input('anio');
        $retrasadas->materiaretrasada = $request->input('materiaretrasada');
        $retrasadas->total = $request->input('total');
        $retrasadas->save();
        $notification = 'El alumno se ha creado correctamente';

        return redirect('/retrasadas')->with(compact('notification'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Retrasada $retrasadas)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retrasada $retrasadas)
    {
        $retrasadas->delete();
        $deletename = $retrasadas->nombre;
        $notification = 'El alumno '.$deletename.' ha eliminado correctamente';
        return redirect('/retrasadas')->with(compact('notification'));
    }
}
