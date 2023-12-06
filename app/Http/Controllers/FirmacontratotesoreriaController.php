<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Firmacontrato;
use App\Models\Padre;

class FirmacontratotesoreriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $padres = Padre::all();

        foreach ($padres as $key => $value) {
            $value->firmacontrato = Firmacontrato::where('id_padre','=',$value->id)->get();
        }


        return view ('tesoreria.firmacontratotesoreria')->with('padres',$padres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_padres = $request->input('id_padre');
        $contador = 0;



        foreach ($id_padres as $key => $id_padre) {
            $firmacontrato = Firmacontrato::where('id_padre','=', $id_padre)->get();

            if (count($firmacontrato) == 0) {
                $firmacontrato = new Firmacontrato;
                $firmacontrato->id_padre = $id_padre;
                $firmacontrato->contrato = $request->input('contrato')[$contador] ?? 0;
                $firmacontrato->save();
            }else{
                $firmacontrato = Firmacontrato::find($firmacontrato[0]->id);
                $firmacontrato->id_padre = $id_padre;
                $firmacontrato->contrato = $request->input('contrato')[$contador] ?? 0;
                $firmacontrato->save();
            }


            $contador += 1;
        }

        return redirect('/firmacontratotesoreria')->with('notification','Contrato firmando exitosamente');
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
