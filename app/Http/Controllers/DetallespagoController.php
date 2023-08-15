<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class DetallespagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    { 
        $alumnos = Alumno::All();
        return view('tesoreria.detallespago', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::All();
        return view('tesoreria.detallespago');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = Cache::get('alumno_id');
        
        $rules = [
            'mensualidad' => 'sometimes',
            'pagosadministrativos' => 'sometimes',
            'bolsaescolar' => 'sometimes'
        ];

        $this->validate($request, $rules);

        $id = 0;

        if ($value) {
            $alumno = Alumno::findOrFail($value);
            $alumno->update($request->only(
                'mensualidad',
                'pagosadministrativos',
                'bolsaescolar',
            ));
            $id = $value;
        } else {

            $alumno = Alumno::create([
                'mensualidad' => $request->has('mensualidad') ? true : false,
                'pagosadministrativos' => $request->has('pagosadministrativos') ? true : false,
                'bolsaescolar' => $request->has('bolsaescolar') ? true : false,
            ]);

    }
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
