<?php

namespace App\Http\Controllers;

use App\Models\Padre;
use Illuminate\Http\Request;

class PadreController extends Controller
{
    public function index()
    {
        $padres = Padre::paginate(5);
        return view('secretaria.Padres.tabla_padre', compact('padres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria.Padres.datos_padre');
    }

    public function sendData(Request $request){
        $rules = [
            'tipo' => 'required',
            'primernombre' => 'required|alpha',
            'segundonombre'=> 'required|alpha',
            'primerapellido' => 'required|alpha',
            'segundoapellido'=> 'required|alpha',
            'numerodeidentidad'=> 'required|min:13|numeric',
            'telefonopersonal'=> 'required|min:8|numeric',
            'lugardetrabajo'=> 'required|alpha',
            'oficio'=> 'required|alpha',
            'telefonooficina'=> 'required|min:8|numeric',
            'ingresos'=> 'required|numeric',
        ];

        $messages= [
            'telefonopersonal.min' => 'El número de teléfono personal mínimo debe tener 8 dígitos',
            'telefonopersonal.numeric' => 'El número de teléfono personal deben ser dígitos del 1 al 10',
            'telefonooficina.min' => 'El número de teléfono de oficina mínimo debe tener 8 dígitos',
            'telefonooficina.numeric' => 'El número de teléfono de oficina deben ser dígitos del 1 al 10',
            'ingresos.numeric' => 'Los ingresos deben ser valores numéricos',
            'numerodeidentidad.numeric' => 'El número de identidad deben tener solo valores numéricos',
            'numerodeidentidad.min' => 'El número de identidad deben tener al menos 13 dígitos',
            'primernombre.alpha' => 'El primer nombre no deben tener valores numéricos',
            'segundonombre.alpha' => 'El segundo nombre no deben tener valores numéricos',
            'primerapellido.alpha' => 'El primer apellido no deben tener valores numéricos',
            'segundoapellido.alpha' => 'El segundo apellido no deben tener valores numéricos',
            
    
           ];

        

        $this->validate($request, $rules, $messages);


        $padres = new Padre();
        $padres->tipo = $request->input('tipo');
        $padres->primernombre = $request->input('primernombre');
        $padres->segundonombre = $request->input('segundonombre');
        $padres->primerapellido = $request->input('primerapellido');
        $padres->segundoapellido = $request->input('segundoapellido');
        $padres->numerodeidentidad = $request->input('numerodeidentidad');
        $padres->telefonopersonal = $request->input('telefonopersonal');
        $padres->lugardetrabajo = $request->input('lugardetrabajo');
        $padres->oficio = $request->input('oficio');
        $padres->telefonooficina = $request->input('telefonooficina');
        $padres->ingresos = $request->input('ingresos');
        $padres->save();
        $notification = 'El padre se ha creado correctamente';

        return redirect('/padres')->with(compact('notification'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $padres = new Padre;
            $padres->tipo = $request->get('tipo');
            $padres->primernombre= $request->get('primernombre');
            $padres->segundonombre= $request->get('segundonombre');
            $padres->primerapellido= $request->get('primerapellido');
            $padres->segundoapellido= $request->get('segundoapellido');
            $padres->numerodeidentidad= $request->get('numerodeidentidad');
            $padres->telefonopersonal= $request->get('telefonopersonal');
            $padres->lugardetrabajo= $request->get('lugardetrabajo');
            $padres->oficio= $request->get('oficio');
            $padres->ingresos= $request->get('ingresos');
    
            $padres->save();
    
            return redirect('/padres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $padre = Padre::findOrFail($id);
        return view('secretaria.Padres.padre_individual')->with('padre',$padre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $padres = Padre::findOrFail($id);
        return view('secretaria.Padres.editar_padre')->with('padres',$padres);
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

        $padres = Padre::findOrFail($id);

        $request->validate([
            'tipo' => 'required|alpha',
            'primernombre' => 'required|alpha',
            'segundonombre'=> 'required|alpha',
            'primerapellido' => 'required|alpha',
            'segundoapellido'=> 'required|alpha',
            'numerodeidentidad'=> 'required|min:13|numeric',
            'telefonopersonal'=> 'required|min:8|numeric',
            'lugardetrabajo'=> 'required|alpha',
            'oficio'=> 'required|alpha',
            'telefonooficina'=> 'required|min:8|numeric',
            'ingresos'=> 'required|numeric'
        ]);


        $padres->tipo = $request->input('tipo');
        $padres->primernombre = $request->input('primernombre');
        $padres->segundonombre = $request->input('segundonombre');
        $padres->primerapellido = $request->input('primerapellido');
        $padres->segundoapellido = $request->input('segundoapellido');
        $padres->numerodeidentidad = $request->input('numerodeidentidad');
        $padres->telefonopersonal = $request->input('telefonopersonal');
        $padres->lugardetrabajo = $request->input('lugardetrabajo');
        $padres->oficio = $request->input('oficio');
        $padres->telefonooficina = $request->input('telefonooficina');
        $padres->ingresos = $request->input('ingresos');
        
        $padres->save();

        $notification = 'El padre se ha actualizado correctamente';

        return redirect()->route('padres.index', ['padre' => $padres->id])->with(compact('notification'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Padre $padres)
    {
        $padres->delete();
        $deletename = $padres->nombre;
        $notification = 'El padre '.$deletename.' ha eliminado correctamente';
        return redirect('/padres')->with(compact('notification'));
    }
}
