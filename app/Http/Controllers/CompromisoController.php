<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Firmacompromiso;
use App\Models\Padre;

class CompromisoController extends Controller
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
            $value->firmacompromiso = Firmacompromiso::where('id_padre','=',$value->id)->get();
        }


        return view ('secretaria.compromiso.indexcompromiso')->with('padres',$padres);
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
            $firmacompromiso = Firmacompromiso::where('id_padre','=', $id_padre)->get();

            if (count($firmacompromiso) == 0) {
                $firmacompromiso = new Firmacompromiso;
                $firmacompromiso->id_padre = $id_padre;
                $firmacompromiso->compromiso = $request->input('compromiso')[$contador] ?? 0;
                $firmacompromiso->save();
            }else{
                $firmacompromiso = Firmacompromiso::find($firmacompromiso[0]->id);
                $firmacompromiso->id_padre = $id_padre;
                $firmacompromiso->compromiso = $request->input('compromiso')[$contador] ?? 0;
                $firmacompromiso->save();
            }


            $contador += 1;
        }


        return redirect('/indexcompromiso')->with('notification','Compromiso firmando exitosamente');
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
