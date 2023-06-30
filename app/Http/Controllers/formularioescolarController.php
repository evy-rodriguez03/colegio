<?php

namespace App\Http\Controllers;

use App\Models\Escolar;

use Illuminate\Http\Request;

class formularioescolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escolar = Escolar::paginate(10);
        return view('orientacion.escolar.escolarindex', compact('escolar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orientacion.escolar.formularioescolaruno');
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
            'eprimerapellido' => 'alpha',
            'esegundoapellido' => 'alpha',
            'eprimernombre' => 'alpha',
            'esegundonombre' => 'alpha',
            'enumerodeidentidad' => 'alpha',
            'egrado' => 'alpha',
            'enumerodecelular' => 'alpha',
            'elugardenacimiento' => 'alpha',
            'efechadenacimiento' => 'alpha',
            'eedad' => 'alpha',
            'procedencia' => 'alpha',
            'tiempolectivo' => 'alpha',
            'telelectivo' => 'alpha',
            'noelectivo' => 'alpha',
            'telnoelectivo' => 'alpha',
            'observaciones' => 'alpha',
        ];

        $messages = [];

        $this->validate($request, $rules, $messages);

        Escolar::create([
            'eprimerapellido' => $request->input('eprimerapellido'),
            'esegundoapellido' => $request->input('esegundoapellido'),
            'eprimernombre' => $request->input('eprimernombre'),
            'esegundonombre' => $request->input('esegundonombre'),
            'enumerodeidentidad' => $request->input('enumerodeidentidad'),
            'egrado' => $request->input('egrado'),
            'enumerodecelular' => $request->input('enumerodecelular'),
            'elugardenacimiento' => $request->input('elugardenacimiento'),
            'efechadenacimiento' => $request->input('efechadenacimiento'),
            'eedad' => $request->input('eedad'),
            'procedencia' => $request->input('procedencia'),
            'tiempolectivo' => $request->input('tiempolectivo'),
            'telelectivo' => $request->input('telelectivo'),
            'noelectivo' => $request->input('noelectivo'),
            'telnoelectivo' => $request->input('telnoelectivo'),
            'observaciones' => $request->input('observaciones'),
        ]);



        return redirect('/escolar')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
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
