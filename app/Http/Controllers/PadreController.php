<?php

namespace App\Http\Controllers;

use App\Models\Padre;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Matriculado;
use App\Models\Periodo;
use App\Models\Proceso;
use Illuminate\Support\Facades\Cache;

class PadreController extends Controller
{
    public function index()
    {
        $padres = Padre::paginate(10);
        return view('secretaria.Padres.tabla_padre', compact('padres'));
    }

    public function pdf()
    {
        $padres = Padre::All();
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
            'segundonombre' => 'required|alpha',
            'primerapellido' => 'required|alpha',
            'segundoapellido' => 'required|alpha',
            'numerodeidentidad' => 'required|min:13|numeric',
            'telefonopersonal' => 'required|min:8|numeric',
            'lugardetrabajo' => 'required|alpha',
            'oficio' => 'required|alpha',
            'telefonooficina' => 'required|min:8|numeric',
            'ingresos' => 'required|numeric',
        ];

        $messages = [
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
            $request->only(
                'tipo',
                'primernombre',
                'segundonombre',
                'primerapellido',
                'segundoapellido',
                'numerodeidentidad',
                'telefonopersonal',
                'lugardetrabajo',
                'oficio',
                'telefonooficina',
                'ingresos'
            )
        );

        return redirect('/padres')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
    }

    public function  createdatospadre()
    {
        $alumno = new Alumno();
        // Recibe el identificador del alumno si viene como parámetro en la URL
        $alumno_id = request()->input('alumno_id');
        return view('secretaria.matricula.datospadre', compact('alumno_id', 'alumno'));
    }

    public function storeconpadre(Request $request)
    {
        $rules = [
            'primernombre' => 'required|min:3|max:14|alpha',
            'segundonombre' => 'required|min:3|max:14|alpha',
            'primerapellido' => 'required|min:3|max:14|alpha',
            'segundoapellido' => 'required|min:3|max:14|alpha',
            'numerodeidentidad' => 'required|min:12|numeric',
            'telefonopersonal' => 'required|min:8|numeric',
            'lugardetrabajo' => 'required|alpha',
            'oficio' => 'required|alpha',
            'telefonooficina' => 'required|min:8|numeric',
            'ingresos' => 'required|numeric',
        ];

        $messages = [
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

        // Crear nuevo padre
        $padre = Padre::create([
            'primernombre' => $request->input('primernombre'),
            'segundonombre' => $request->input('segundonombre'),
            'primerapellido' => $request->input('primerapellido'),
            'segundoapellido' => $request->input('segundoapellido'),
            'numerodeidentidad' => $request->input('numerodeidentidad'),
            'telefonopersonal' => $request->input('telefonopersonal'),
            'lugardetrabajo' => $request->input('lugardetrabajo'),
            'oficio' => $request->input('oficio'),
            'telefonooficina' => $request->input('telefonooficina'),
            'ingresos' => $request->input('ingresos'),
            'compromiso' => $request->input('compromiso', 0), // valor predeterminado de 0 si no se proporciona
            'tipo' => 'Padre' // tipo predeterminado siempre es "Padre"
        ]);

        // Obtener el ID del alumno
        $alumno_id = Cache::get('alumno_id');

          // Asociar el padre al alumno
        $alumno = Alumno::find($alumno_id);
        $alumno->padres()->attach($padre->id);

        return redirect()->route('datosmadre.create');
    }


    public function createdatosmadre()
    {
        $alumno = new Alumno();
        // Recibe el identificador del alumno si viene como parámetro en la URL
        $alumno_id = request()->input('alumno_id');
        return view('secretaria.matricula.datosmadre', compact('alumno', 'alumno_id'));
    }

    public function storeconmadre(Request $request)
    {
        $rules = [
            'primernombre' => 'required|alpha',
            'segundonombre' => 'required|alpha',
            'primerapellido' => 'required|alpha',
            'segundoapellido' => 'required|alpha',
            'numerodeidentidad' => 'required|min:13|numeric',
            'telefonopersonal' => 'required|min:8|numeric',
            'lugardetrabajo' => 'required|alpha',
            'oficio' => 'required|alpha',
            'telefonooficina' => 'required|min:8|numeric',
            'ingresos' => 'required|numeric',
        ];

        $messages = [
            'primernombre.max' => 'El numero de caracteres maximo del primer nombre es de 13',
            'segundonombre.max' => 'El numero de caracteres maximo del segundo nombre es de 13',
            'primerapellido.max' => 'El numero de caracteres maximo del primer apellido es de 13',
            'segundoapellido.max' => 'El numero de caracteres maximo del segundo apellido es de 13',
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

        // Crear nuevo padre
        $padre = Padre::create([
            'primernombre' => $request->input('primernombre'),
            'segundonombre' => $request->input('segundonombre'),
            'primerapellido' => $request->input('primerapellido'),
            'segundoapellido' => $request->input('segundoapellido'),
            'numerodeidentidad' => $request->input('numerodeidentidad'),
            'telefonopersonal' => $request->input('telefonopersonal'),
            'lugardetrabajo' => $request->input('lugardetrabajo'),
            'oficio' => $request->input('oficio'),
            'telefonooficina' => $request->input('telefonooficina'),
            'ingresos' => $request->input('ingresos'),
            'compromiso' => $request->input('compromiso', 0), // valor predeterminado de 0 si no se proporciona
            'tipo' => 'Madre' // tipo predeterminado siempre es "Padre"
        ]);

        // Obtener el ID del alumno
        $alumno_id = Cache::get('alumno_id');

        // Asociar el padre al alumno
        $alumno = Alumno::find($alumno_id);
        $alumno->padres()->attach($padre->id);

        return redirect()->route('datosencargado.create');
    }

    public function createdatosencargado()
    {
        $alumno = new Alumno();
        // Recibe el identificador del alumno si viene como parámetro en la URL
        $alumno_id = request()->input('alumno_id');
        return view('secretaria.matricula.datosencargado', compact('alumno', 'alumno_id'));
    }

    public function storeconencargado(Request $request)
    {
        $rules = [
            'primernombre' => 'required|alpha',
            'segundonombre' => 'required|alpha',
            'primerapellido' => 'required|alpha',
            'segundoapellido' => 'required|alpha',
            'numerodeidentidad' => 'required|min:12|numeric',
            'telefonopersonal' => 'required|min:8|numeric',
            'lugardetrabajo' => 'required|alpha',
            'oficio' => 'required|alpha',
            'telefonooficina' => 'required|min:8|numeric',
            'ingresos' => 'required|numeric',
        ];

        $messages = [
            'primernombre.max' => 'El numero de caracteres maximo del primer nombre es de 13',
            'segundonombre.max' => 'El numero de caracteres maximo del segundo nombre es de 13',
            'primerapellido.max' => 'El numero de caracteres maximo del primer apellido es de 13',
            'segundoapellido.max' => 'El numero de caracteres maximo del segundo apellido es de 13',
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

        // Crear nuevo padre
        $padre = Padre::create([
            'primernombre' => $request->input('primernombre'),
            'segundonombre' => $request->input('segundonombre'),
            'primerapellido' => $request->input('primerapellido'),
            'segundoapellido' => $request->input('segundoapellido'),
            'numerodeidentidad' => $request->input('numerodeidentidad'),
            'telefonopersonal' => $request->input('telefonopersonal'),
            'lugardetrabajo' => $request->input('lugardetrabajo'),
            'oficio' => $request->input('oficio'),
            'telefonooficina' => $request->input('telefonooficina'),
            'ingresos' => $request->input('ingresos'),
            'compromiso' => $request->input('compromiso', 0), // valor predeterminado de 0 si no se proporciona
            'tipo' => 'Encargado' // tipo predeterminado siempre es "Padre"
        ]);

        // Obtener el ID del alumno
        $alumno_id = Cache::get('alumno_id');

        // Asociar el padre al alumno
        $alumno = Alumno::find($alumno_id);
        $alumno->padres()->attach($padre->id);

        $estado = Proceso::findOrFail($alumno_id);
        $estado->delete();

        Cache::forget('alumno_id');

        return redirect()->route('principal.create');
    }


    public function terminar_matricula()
    {
    $alumno_id = Cache::get('alumno_id');
    $alumno = Alumno::find($alumno_id);

    $cursoId = Cache::get('curso_id');

     // Verificar si hay al menos un padre de familia asociado al alumno
     if ($alumno->padres()->count() > 0) {
        $estado = Proceso::findOrFail($alumno_id);
        $estado->delete();

        $matricula = new Matriculado();
        $matricula->alumno_id = $alumno_id;
        $matricula->curso_id = $cursoId;
        $matricula->alumno_id = $alumno_id;
        $periodo = Periodo::where('fechaInicio', '<=', now())
                        ->where('fechaCierre', '>=', now())
                        ->first();

     $matricula->periodo_id = $periodo->id;
     $matricula->save();                

    $alumno->cursos()->attach($cursoId, ['periodo_id' => $periodo->id]);

    Cache::forget('alumno_id');
    Cache::forget('Curso_id');

    return redirect()->route('principal.create');
            } else {
            $mensaje = "No se ha registrado ningún padre de familia para este alumno.";
            return redirect()->back()->with('error', $mensaje);
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
        $padre = Padre::findOrFail($id);
        return view('secretaria.Padres.padre_individual')->with('padre', $padre);
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
    public function update(Request $request, $id)
    {

        $rules = [
            'tipo' => 'required|alpha',
            'primernombre' => 'required|alpha',
            'segundonombre' => 'required|alpha',
            'primerapellido' => 'required|alpha',
            'segundoapellido' => 'required|alpha',
            'numerodeidentidad' => 'required|min:12|numeric',
            'telefonopersonal' => 'required|min:8|numeric',
            'lugardetrabajo' => 'required|alpha',
            'oficio' => 'required|alpha',
            'telefonooficina' => 'required|min:8|numeric',
            'ingresos' => 'required|numeric'
        ];

        $messages = [
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

        $padres = Padre::findOrFail($id);

        $padres->update($request->only(
            'tipo',
            'primernombre',
            'segundonombre',
            'primerapellido',
            'segundoapellido',
            'numerodeidentidad',
            'telefonopersonal',
            'lugardetrabajo',
            'oficio',
            'telefonooficina',
            'ingresos'
        ));

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