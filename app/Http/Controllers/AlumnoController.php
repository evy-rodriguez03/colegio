<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Proceso;
use App\Models\Periodo;
use App\Models\Escolar;
use App\Models\Escolardos;
use Illuminate\Support\Facades\Cache;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::with('Cursos')->paginate(10);
        return view('secretaria.Alumnos.index', compact('alumnos'));
    }

    public function pdf()
    {
        $alumnos = Alumno::All();
        $index = 1; 
        $pdf = Pdf::loadView('secretaria.alumnos.pdf', compact('alumnos', 'index'));
        return $pdf->stream();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria.alumnos.create');
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

            'primernombre' => 'required|min:3|string',
            'segundonombre' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'primerapellido' => 'required|min:3|string',
            'segundoapellido' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'numerodeidentidad' => 'required|min:13|numeric',
            'fechadenacimiento' => 'required|date',
            'alergia' => 'sometimes',
            'tiene_alergia' => 'sometimes',
            'genero' => 'min:1|string',
            'direccion' => 'required|string',
            'numerodehermanosenicgc' => 'required|numeric',
            'fotografias' => 'sometimes',
            'fotografiasdelpadre' => 'sometimes',
            'carnet' => 'sometimes',
            'certificadodeconductadeconducta' => 'sometimes',
            'ciudad' => 'required|min:3|max:16|string',
            'depto' => 'required|min:3|max:16|string',
            'pais' => 'required|min:3|max:16|string',
            'gradoingresar' => 'required|min:3|max:16|string',
            'escuelaanterior' => 'sometimes',
            'totalhermanos' => 'required|numeric',
            'medico' => 'required|min:3|max:12|string',
            'telefonoemergencia' => 'required|min:3|numeric',
            'bus' => 'sometimes',
            'taxi' => 'sometimes',
            'conpadre' => 'sometimes',
            'solo' => 'sometimes'


        ];
        $messages = [
            'primernombre.required' => 'El primer nombre es requerido.',
            'primernombre.min' => 'El minimo son 3 caracteres.',
            'telefonoemergencia.required' => 'El número de telefono es necesario',
            'telefonoemergencia.min' => 'El numero de telefono tiene un minimo de 8 caracteres',
            'telefonoemergencia.numeric' => 'El número de telefono solo acepta números',
            'primerapellido.required' => 'El primer apellido es requerido.',
            'primerapellido.min' => 'El minimo son 3 caracteres.',
            'segundoapellido.min' => 'El minimo son 3 caracteres.',
            'numerodeidentidad.required' => 'El número de identidad es necesario.',
            'numerodeidentidad.min' => 'El minimo de caracteres del número de identidad es de 13 digitos',
            'numerodeidentidad.numeric' => 'El campo número de identidad solo permite números',
            'fechadenacimiento.required' => 'La fecha de nacimiento es necesaria.',
            'fechadenacimiento.date' => 'La fecha es necesaria',
            'genero.required' => 'M=Si es masculino, y F=Si es femenino',
            'genero.min' => 'Es necesario tener al menos 1 caracter en genero',
            'direccion.required' => 'El campo dirección es necesario',
            'numerodehermanosenicgc.required' => 'Sino tiene escriba "0"',
            'numerodehermanosenicgc.numeric' => 'Solo acepta números',
            'ciudad.required' => 'la cuidad es necesaria',
            'ciudad.min' => 'se necesita 3 caracteres como minimo',
            'depto.required' => 'el departamento es necesario',
            'depto.min' => 'se necesita  3 caracter como minimo',
            'pais.required' => 'es necesario el pais',
            'pais.min' => 'se necesita como 3 caracteres',
            'gradoingresar.required' => 'se necesita el grado',
            'gradoingresar.min' => 'se necesita como minimo 3 caracteres',
            'totalhermanos.required' => 'se necesita el total de hermanos',
            'medico.required' => 'se necesita el nombre del medico',
            'medico.min' => 'es necesario 3 caractares como minimo',
        ];
        $this->validate($request, $rules, $messages);


        Alumno::create(
            $request->only(
                'primernombre',
                'segundonombre',
                'primerapellido',
                'segundoapellido',
                'numerodeidentidad',
                'fechadenacimiento',
                'alergia',
                'lugardenacimiento',
                'genero',
                'direccion',
                'numerodehermanosenicgc',
                'fotografias',
                'fotografiasdelpadre',
                'carnet',
                'certificadodeconducta',
                'ciudad',
                'depto',
                'pais',
                'gradoingresar',
                'escuelaanterior',
                'totalhermanos',
                'medico',
                'telefonoemergencia',
                'bus',
                'taxi',
                'conpadre',
                'solo',
            )
        );
        return redirect('/alumnos')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
    }

    public function creatematricula($id = 0)
    {
        $periodo = Periodo::where('activo', '=', 1)->get();
        $cursos = Curso::where('idperiodo', '=', $periodo[0]->id)->pluck('niveleducativo', 'id');

        if ($id != 0) {
            Cache::put('alumno_id', $id);
            $alumno = Alumno::find($id);
        } else {
            $alumno = new Alumno();
            Cache::forget('alumno_id');
        }

        return view('secretaria.matricula.datosalumno', compact('alumno', 'cursos'));
    }

    public function storematricula(Request $request)
    {
        $value = Cache::get('alumno_id');

        $rules = [
            'primernombre' => 'required|min:3|max:12|string',
            'segundonombre' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'primerapellido' => 'required|min:3|max:12|string',
            'segundoapellido' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'numerodeidentidad' => 'required|min:13|numeric|unique:alumnos,numerodeidentidad,' . $value,
            'fechadenacimiento' => 'required|date',
            'alergia' => 'sometimes',
            'tiene_alergia' => 'nullable',
            'genero' => 'required|min:1|string',
            'direccion' => 'nullable|string',
            'numerodehermanosenicgc' => 'nullable|numeric',
            'fotografias' => 'sometimes',
            'fotografiasdelpadre' => 'sometimes',
            'carnet' => 'sometimes',
            'certificadodeconductadeconducta' => 'sometimes',
            'ciudad' => 'nullable|min:3|max:16|string',
            'depto' => 'nullable|min:3|max:16|string',
            'pais' => 'nullable|min:3|max:16|string',
            'escuelaanterior' => 'sometimes',
            'totalhermanos' => 'nullable|numeric',
            'medico' => 'nullable|min:3|max:18|string',
            'telefonoemergencia' => 'nullable|numeric',
            'bus' => 'sometimes',
            'taxi' => 'sometimes',
            'conpadre' => 'sometimes',
            'solo' => 'sometimes',
            'curso_id' => 'required',

        ];
        $messages = [
            'primernombre.required' => 'El primer nombre es requerido.',
            'primernombre.max' => 'El maximo de primer nombre son 12 caracteres.',
            'primernombre.min' => 'El minimo  de primer nombre son 3 caracteres.',
            'telefonoemergencia.required' => 'El número de telefono es necesario',
            'telefonoemergencia.min' => 'El numero de telefono tiene un minimo de 8 caracteres',
            'telefonoemergencia.numeric' => 'El número de telefono solo acepta números',
            'primerapellido.required' => 'El primer apellido es requerido.',
            'primerapellido.min' => 'El minimo de primer apellido son 3 caracteres.',
            'primerapellido.max' => 'El maximo de primer apellido son 12 caracteres.',
            'numerodeidentidad.required' => 'El número de identidad es necesario.',
            'numerodeidentidad.min' => 'El minimo de caracteres del número de identidad es de 13 digitos',
            'numerodeidentidad.numeric' => 'El campo número de identidad solo permite números',
            'numerodeidentidad.unique' => 'El campo número de identidad debe ser unico',
            'tiene_alergia.required' => 'Debe seleccionar si tiene una alergia o no',
            'fechadenacimiento.required' => 'La fecha de nacimiento es necesaria.',
            'fechadenacimiento.date' => 'La fecha es necesaria',
            'genero.required' => 'seleccion si es masculino, o es femenino',
            'genero.min' => 'Es necesario tener al menos 1 caracter en genero',
            'direccion.required' => 'El campo dirección es necesario',
            'numerodehermanosenicgc.required' => 'Sino hermanos tiene escriba "0"',
            'numerodehermanosenicgc.numeric' => 'Solo acepta números',
            'ciudad.required' => 'la cuidad es necesaria',
            'ciudad.min' => 'se necesita 3 caracteres como minimo',
            'depto.required' => 'el departamento es necesario',
            'depto.min' => 'se necesita  3 caracter como minimo',
            'pais.required' => 'es necesario el pais',
            'pais.min' => 'se necesita como 3 caracteres',
            'totalhermanos.required' => 'se necesita el total de hermanos',
            'medico.required' => 'se necesita el nombre del medico',
            'medico.min' => 'es necesario 3 caractares como minimo',
            'medico.max' => 'El maximo del nombre del doctor son 12 caracteres.',
            'curso_id.required' => 'es necesario seleccionar el grado',
        ];
        $this->validate($request, $rules, $messages);

        $id = 0;

        if ($value) {
            $alumno = Alumno::findOrFail($value);
            $alumno->update($request->only(
                'primernombre',
                'segundonombre',
                'primerapellido',
                'segundoapellido',
                'numerodeidentidad',
                'fechadenacimiento',
                'alergia',
                'tiene_alergia',
                'lugardenacimiento',
                'genero',
                'direccion',
                'numerodehermanosenicgc',
                'fotografias',
                'fotografiasdelpadre',
                'carnet',
                'certificadodeconducta',
                'ciudad',
                'depto',
                'pais',
                'escuelaanterior',
                'totalhermanos',
                'medico',
                'telefonoemergencia',
                'bus',
                'taxi',
                'conpadre',
                'solo',
            ));
            $id = $value;
            Cache::put('curso_id', $request->input('curso_id'));
            Cache::put('alumno_id', $alumno->id);
        } else {

            $alumno = Alumno::create([
                'primernombre' => $request->input('primernombre'),
                'segundonombre' => $request->input('segundonombre'),
                'primerapellido' => $request->input('primerapellido'),
                'segundoapellido' => $request->input('segundoapellido'),
                'numerodeidentidad' => $request->input('numerodeidentidad'),
                'fechadenacimiento' => $request->input('fechadenacimiento'),
                'alergia' => $request->input('alergia'),
                'tiene_alergia' => $request->input('tiene_alergia'),
                'lugardenacimiento' => $request->input('lugardenacimiento'),
                'genero' => $request->input('genero'),
                'direccion' => $request->input('direccion'),
                'numerodehermanosenicgc' => $request->input('numerodehermanosenicgc'),
                'fotografias' => $request->has('fotografias') ? true : false,
                'fotografiasdelpadre' => $request->has('fotografiasdelpadre') ? true : false,
                'carnet' => $request->has('carnet') ? true : false,
                'certificadodeconducta' => $request->has('certificadodeconducta') ? true : false,
                'ciudad' => $request->input('ciudad'),
                'depto' => $request->input('depto'),
                'pais' => $request->input('pais'),
                'escuelaanterior' => $request->input('escuelaanterior'),
                'totalhermanos' => $request->input('totalhermanos'),
                'medico' => $request->input('medico'),
                'telefonoemergencia' => $request->input('telefonoemergencia'),
                'bus' => $request->has('bus') ? true : false,
                'taxi' => $request->has('taxi') ? true : false,
                'conpadre' => $request->has('conpadre') ? true : false,
                'solo' => $request->has('solo') ? true : false,
            ]);

            Cache::put('curso_id', $request->input('curso_id'));

            session(['alumno_id' => $alumno->id]);
            Cache::put('alumno_id', $alumno->id);
            $id =  $alumno->id;
        }


        $estado = new Proceso();
        $estado->id = $id;
        $estado->matriculado = 'no';
        $estado->curso_id = $request->input('curso_id');
        $estado->save();

        $escolar = new Escolar();

        //f1
        $escolar->alumno_id = $alumno->id;
        $escolar->primerapellido = $alumno->primerapellido;
        $escolar->segundoapellido = $alumno->segundoapellido = null;
        $escolar->primernombre = $alumno->primernombre;
        $escolar->segundonombre = $alumno->segundonombre = null;
        $escolar->enumerodecelular = null;
        $escolar->eedad = null;
        $escolar->procedencia = null;
        $escolar->tiempolectivo = null;
        $escolar->telelectivo = null;
        $escolar->noelectivo = null;
        $escolar->telnoelectivo = null;
        $escolar->observaciones = null;


        

        //f3
        $escolar->situacioneconomica = null;
        $escolar->casavives = null;
        $escolar->computadora = null;
        $escolar->tablet = null;
        $escolar->celular = null;
        $escolar->internet = null;
        $escolar->otroscasa = null;
        $escolar->talla = null;
        $escolar->peso = null;
        $escolar->hatenido = null;
        $escolar->ver = null;
        $escolar->verespecifique = null;
        $escolar->vercorregida = null;
        $escolar->escuchar = null;
        $escolar->escucharespecifique = null;
        $escolar->escucharcorregida = null;
        $escolar->estadodentadura = null;
        $escolar->recibidovacuna = null;

        //f4
        $escolar->abanda = null;
        $escolar->afutbol = null;
        $escolar->apingpong = null;
        $escolar->anumeros = null;
        $escolar->alectura = null;
        $escolar->acoro = null;
        $escolar->abasket = null;
        $escolar->atennis = null;
        $escolar->amanuales = null;
        $escolar->aoratoria = null;
        $escolar->avolley = null;
        $escolar->aatletismo = null;
        $escolar->adomestico = null;
        $escolar->aanimales = null;
        $escolar->adibujo = null;
        $escolar->afiestas = null;
        $escolar->acientificos = null;
        $escolar->aenfermos = null;
        $escolar->aotros = null;
        $escolar->trabajar = null;
        $escolar->namigos =null;
        $escolar->pasatiempos1 = null;
        $escolar->pasatiempos2 = null;
        $escolar->pasatiempos3 = null;
        $escolar->edadamigos = null;

        //f5
        $escolar->estudios = null;
        $escolar->repetido = null;
        $escolar->claseestudiante = null;
        $escolar->agrado = null;
        $escolar->agradomenos = null;
        $escolar->considera = null;
        $escolar->horasextra = null;
        $escolar->tiempolibre = null;
        $escolar->rendimiento = null;
        $escolar->ayudarsele = null;
        $escolar->cursosrepetidos = null;
        $escolar->materiasreprobadas = null;
        $escolar->materiasagradan = null;
        $escolar->atribuyeagrado = null;
        $escolar->agradanmenos = null;
        $escolar->materiasdificultad = null;
        $escolar->culturageneral = null;
        $escolar->diversificado = null;

        //f6
        $escolar->pbienconud = null;
        $escolar->hablarconel = null;
        $escolar->psolucion = null;
        $escolar->pconfianza = null;
        $escolar->mbienconud = null;
        $escolar->hablarconella = null;
        $escolar->msolucion = null;
        $escolar->mconfianza = null;
        $escolar->pcomprensivo = null;
        $escolar->mcomprensivo = null;
        $escolar->ecomprensivo = null;
        $escolar->pbondadoso = null;
        $escolar->mbondadoso = null;
        $escolar->ebondadoso = null;
        $escolar->pfuete = null;
        $escolar->mfuete = null;
        $escolar->efuete = null;
        $escolar->pestricto = null;
        $escolar->mestricto = null;
        $escolar->eestricto = null;
        $escolar->ptolerante = null;
        $escolar->mtolerante = null;
        $escolar->etolerante = null;
        $escolar->pcomunicativo = null;
        $escolar->mcomunicativo = null;
        $escolar->ecomunicativo = null;
        $escolar->pproblemas = null;
        $escolar->mproblemas = null;
        $escolar->eproblemas = null;
        $escolar->pestudio = null;
        $escolar->mestudio = null;
        $escolar->eestudio = null;
        $escolar->plibertades = null;
        $escolar->mlibertades = null;
        $escolar->elibertades = null;
        $escolar->pfuturo = null;
        $escolar->mfuturo = null;
        $escolar->efuturo = null;
        $escolar->pgrande = null;
        $escolar->mgrande = null;
        $escolar->egrande = null;
        $escolar->pleve = null;
        $escolar->mleve = null;
        $escolar->eleve = null;
        $escolar->nopapa = null;
        $escolar->nomama = null;
        $escolar->relaciones = null;


        //f7
        $escolar->triste = null;
        $escolar->llora = null;
        $escolar->preocupado = null;
        $escolar->nervioso = null;
        $escolar->solo = null;
        $escolar->debil = null;
        $escolar->amistoso = null;
        $escolar->carinioso = null;
        $escolar->timido = null;
        $escolar->testarudo = null;
        $escolar->tranquilo = null;
        $escolar->puntual = null;
        $escolar->egoista = null;
        $escolar->celoso = null;
        $escolar->violento = null;
        $escolar->agresivo = null;
        $escolar->comprensivo = null;
        $escolar->ordenado = null;
        $escolar->comunicativo = null;
        $escolar->religioso = null;
        $escolar->futuro = null;
        $escolar->retraido = null;
        $escolar->cooperador = null;

        $escolar->save();

        $escolar = new Escolardos();

        //f2
        $escolar->alumno_id = $alumno->id;
        
        $escolar->nacimientopadre = null;
        $escolar->edadpadre = null;
        
        $escolar->nestudiopadre = null;
        $escolar->profesionpadre = null;
        $escolar->ocupacionpadre = null;
        
        $escolar->nacimientomadre = null;
        $escolar->edadmadre = null;
        
        $escolar->nestudiomadre = null;
        $escolar->profesionmadre = null;
        $escolar->ocupacionmadre = null;
        
        $escolar->nacimientoencargado = null;
        $escolar->edadencargado = null;
       
        $escolar->nestudioencargado = null;
        $escolar->profesionencargado = null;
        $escolar->ocupacionencargado = null;
        
        $escolar->vivescon = null;
        $escolar->especifiquevives = null;
        $escolar->motivo = null;
        $escolar->nmujeres = null;
        $escolar->nhombres = null;
        $escolar->lugarocupado = null;
        $escolar->checkpadrastro = null;
        $escolar->checkmadrastra = null;
        $escolar->otrapersona = null;

        $escolar->save();
        

        return redirect()->route('datospadre.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $i
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = Alumno::findOrFail($id);
        $padres = $alumnos->padres;
        return view('secretaria.alumnos.show', compact('alumnos', 'padres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnos = Alumno::findOrFail($id);
        return view('secretaria.alumnos.edit', compact('alumnos'));
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
            'primernombre' => 'required|min:3|max:12|string',
            'segundonombre' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'primerapellido' => 'required|min:3|max:12|string',
            'segundoapellido' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'fechadenacimiento' => 'required|date',
            'alergia' => 'sometimes',
            'tiene_alergia' => 'nullable',
            'genero' => 'required|min:1|string',
            'direccion' => 'nullable|string',
            'numerodehermanosenicgc' => 'nullable|numeric',
            'fotografias' => 'sometimes',
            'fotografiasdelpadre' => 'sometimes',
            'carnet' => 'sometimes',
            'certificadodeconductadeconducta' => 'sometimes',
            'ciudad' => 'nullable|min:3|max:16|string',
            'depto' => 'nullable|min:3|max:16|string',
            'pais' => 'nullable|min:3|max:16|string',
            'escuelaanterior' => 'sometimes',
            'totalhermanos' => 'nullable|numeric',
            'medico' => 'nullable|min:3|max:18|string',
            'telefonoemergencia' => 'nullable|numeric',
            'bus' => 'sometimes',
            'taxi' => 'sometimes',
            'conpadre' => 'sometimes',
            'solo' => 'sometimes',
        ];
        $messages = [
            'primernombre.required' => 'El primer nombre es requerido.',
            'primernombre.min' => 'El minimo son 3 caracteres.',
            'telefonodeencargado.required' => 'El número de telefono es necesario',
            'telefonodeencargado.min' => 'El numero de telefono tiene un minimo de 8 caracteres',
            'telefonodeencargado.numeric' => 'El número de telefono solo acepta números',
            'primerapellido.required' => 'El primer apellido es requerido.',
            'primerapellido.min' => 'El minimo son 3 caracteres.',
            'numerodeidentidad.required' => 'El número de identidad es necesario.',
            'numerodeidentidad.min' => 'El minimo de caracteres del número de identidad es de 13 digitos',
            'numerodeidentidad.numeric' => 'El campo número de identidad solo permite números',
            'fechadenacimiento.required' => 'La fecha de nacimiento es necesaria.',
            'fechadenacimiento.date' => 'La fecha es necesaria',
            'alergia.required' => 'Escriba SI, si tiene alergia; sino escriba NO',
            'alergia.min' => 'Se necesitan 2 caracteres como minimo para alergia',
            'alergia.alpha' => 'Alergia solo acepta letras',
            'genero.required' => 'M=Si es masculino, y F=Si es femenino',
            'genero.min' => 'Es necesario tener al menos 1 caracter en genero',

            'direccion.required' => 'El campo dirección es necesario',
            'numerodehermanosenicgc.required' => 'Sino tiene escriba "0"',
            'numerodehermanosenicgc.numeric' => 'Solo acepta números',
        ];
        $this->validate($request, $rules, $messages);

        $alumnos = Alumno::findOrFail($id);

        $alumnos->update($request->only(
            'primernombre',
            'segundonombre',
            'telefonodeencargado',
            'primerapellido',
            'segundoapellido',
            'numerodeidentidad',
            'fechadenacimiento',
            'alergia',
            'lugardenacimiento',
            'genero',
            'direccion',
            'numerodehermanosenicgc',
            'fotografias',
            'fotografiasdelpadre',
            'carnet',
            'certificadodeconducta',
            'bus',
            'taxi',
            'conpadre',
            'solo',
        ));

        return redirect('/alumnos')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
    }

    public function comprobar(Request $request)
    {
        $alumnos = Alumno::where('numerodeidentidad', '=', $request->input('identidad'))->get();

        if (isset($alumnos[0]->id)) {
            Cache::put('alumno_id', $alumnos[0]->id);
            return redirect()->route('creatematricula', ['id' => $alumnos[0]->id])->with('success', '¡Matricula Existente!');
        } else {
            Cache::forget('alumno_id');
            return redirect()->route('creatematricula')->with('success', '¡Alumno no matriculado!')->with('identidad', $request->input('identidad'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumnos = Alumno::findOrfail($id);
        $alumnos->delete();


        return redirect('/alumnos')->with('eliminar', 'ok');
    }
}
