<?php

namespace App\Http\Controllers;

use App\Models\Padre;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Http\Request;
use App\Models\Alumno;

class PadreController extends Controller
{
    public function index()
    {
        $padres = Padre::paginate(10);
        return view('secretaria.Padres.tabla_padre', compact('padres'));
    }

    public function pdf(){
        $padres=Padre::All();
        $pdf = Pdf::loadView('secretaria.Padres.pdfpadres', compact('padres'));
        return $pdf->stream();
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

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        Padre::create(
            $request->only('tipo','primernombre', 'segundonombre', 'primerapellido', 'segundoapellido',
            'numerodeidentidad','telefonopersonal', 
            'lugardetrabajo', 'oficio', 'telefonooficina', 'ingresos' )
            );

        return redirect('/padres')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
    }

      public function createdatospadre()
      {
        $alumno = new Alumno();
         // Recibe el identificador del alumno si viene como parámetro en la URL
         $alumno_id = request()->input('alumno_id');
        return view('secretaria.matricula.datospadre',compact('alumno_id','alumno'));
      }

      public function storeconpadre(Request $request)
{
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

    $padre = Padre::create(
        array_merge(
            $request->only('primernombre', 'segundonombre', 'primerapellido', 'segundoapellido',
            'numerodeidentidad','telefonopersonal', 'lugardetrabajo', 'oficio', 'telefonooficina', 'ingresos' ),
            ['tipo' => 'Padre']
        )
    );
    

    $alumno_id = $request->input('alumno_id');
    if ($alumno_id) {
        // Buscar al alumno correspondiente
        $alumno = Alumno::find($alumno_id);

        // Relacionar al padre con el alumno
        $alumno->padre()->attach($padre->id);
    }

    return redirect('/alumnomadre');
}


      public function createdatosmadre()
      {
        $alumno = new Alumno();
         // Recibe el identificador del alumno si viene como parámetro en la URL
         $alumno_id = request()->input('alumno_id');
        return view('secretaria.matricula.datosmadre',compact('alumno', 'alumno_id'));
      }

      public function storeconmadre(Request $request)
      {
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

        $padre = Padre::create(
            array_merge(
                $request->only('primernombre', 'segundonombre', 'primerapellido', 'segundoapellido',
                'numerodeidentidad','telefonopersonal', 'lugardetrabajo', 'oficio', 'telefonooficina', 'ingresos' ),
                ['tipo' => 'Madre']
            )
        );
        
    
        $alumno_id = $request->input('alumno_id');
        if ($alumno_id) {
            // Buscar al alumno correspondiente
            $alumno = Alumno::find($alumno_id);
    
            // Relacionar al padre con el alumno
            $alumno->padres()->attach($padre->id);
        }

        return redirect('/alumnoencargado');
      }

      public function createdatosencargado()
      {
        $alumno = new Alumno();
        $alumno_id = request()->input('alumno_id');
        return view('secretaria.matricula.datosencargado', compact('alumno','alumno_id'));
      }

      public function storeconencargado(Request $request)
      {
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

        $padre = Padre::create(
            array_merge(
                $request->only('primernombre', 'segundonombre', 'primerapellido', 'segundoapellido',
                'numerodeidentidad','telefonopersonal', 'lugardetrabajo', 'oficio', 'telefonooficina', 'ingresos' ),
                ['tipo' => 'Encargado']
            )
        );
        
    
        $alumno_id = $request->input('alumno_id');
        if ($alumno_id) {
            // Buscar al alumno correspondiente
            $alumno = Alumno::find($alumno_id);
    
            // Relacionar al padre con el alumno
            $alumno->padres()->attach($padre->id);
        }

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
        return view('secretaria.Padres.editar_padre', compact('padres'));
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

        $rules = [
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
           $this->validate($request,$rules,$messages);

           $padres = Padre::findOrFail($id);

           $padres->update($request->only('tipo','primernombre', 'segundonombre', 'primerapellido', 
           'segundoapellido','numerodeidentidad','telefonopersonal', 'lugardetrabajo', 
           'oficio', 'telefonooficina', 'ingresos'));
  
        return redirect('/padres')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $padres = Padre::findOrfail($id);
        $padres->delete();

        
        return redirect('/padres')->with('eliminar', 'ok');
    }
}
