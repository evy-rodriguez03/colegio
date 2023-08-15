<?php

namespace App\Http\Controllers;

use App\Models\Escolar;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Padre;

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
        $alumnos = Alumno::all();
        return view('orientacion.escolar.escolarindex', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {// 
    //     $rules = [
    //         // 'eprimerapellido' => 'alpha|nullable',
    //         // 'esegundoapellido' => 'alpha|nullable',
    //         // 'eprimernombre' => 'alpha|nullable',
    //         // 'esegundonombre' => 'alpha|nullable',
    //         // 'enumerodeidentidad' => 'alpha|nullable',
    //         'egrado' => 'alpha|nullable',
    //         'enumerodecelular' => 'alpha|nullable',
    //         // 'elugardenacimiento' => 'alpha|nullable',
    //         // 'efechadenacimiento' => 'alpha|nullable',
    //         // 'eedad' => 'alpha|nullable',
    //         // 'procedencia' => 'alpha|nullable',
    //         'tiempolectivo' => 'alpha|nullable',
    //         'telelectivo' => 'alpha|nullable',
    //         'noelectivo' => 'alpha|nullable',
    //         'telnoelectivo' => 'alpha|nullable',
    //         'observaciones' => 'alpha|nullable',
    //     ];

    //     $messages = [];

    //     $this->validate($request, $rules, $messages);

    //     Escolar::create([
    //         // 'eprimerapellido' => $request->input('eprimerapellido'),
    //         // 'esegundoapellido' => $request->input('esegundoapellido'),
    //         // 'eprimernombre' => $request->input('eprimernombre'),
    //         // 'esegundonombre' => $request->input('esegundonombre'),
    //         // 'enumerodeidentidad' => $request->input('enumerodeidentidad'),
    //         'egrado' => $request->input('egrado'),
    //         'enumerodecelular' => $request->input('enumerodecelular'),
    //         // 'elugardenacimiento' => $request->input('elugardenacimiento'),
    //         // 'efechadenacimiento' => $request->input('efechadenacimiento'),
    //         // 'eedad' => $request->input('eedad'),
    //         // 'procedencia' => $request->input('procedencia'),
    //         'tiempolectivo' => $request->input('tiempolectivo'),
    //         'telelectivo' => $request->input('telelectivo'),
    //         'noelectivo' => $request->input('noelectivo'),
    //         'telnoelectivo' => $request->input('telnoelectivo'),
    //         'observaciones' => $request->input('observaciones'),
    //     ]);



    //     return redirect()->route('escolar.create')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
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
        $escolar = Escolar::findOrFail($id);
        $alumnos = Alumno::with('cursos')->paginate(10);
        $curso = Curso::pluck('niveleducativo');
        return view('orientacion.escolar.formularioescolaruno', compact('alumnos', 'escolar', 'curso'));
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
        $escolar = Escolar::findOrFail($id);
        $request->validate([

            'enumerodecelular' => 'nullable|numeric',
            'eedad' => 'nullable|numeric',
            'procedencia' => 'nullable',
            'tiempolectivo' => 'nullable',
            'telelectivo' => 'nullable|numeric',
            'noelectivo' => 'nullable',
            'telnoelectivo' => 'nullable|numeric',
            'observaciones' => 'nullable'
        ]);

        // Actualiza los datos del formulario
        $escolar->alumno_id = $escolar->alumno_id;
        $escolar->primerapellido = $escolar->primerapellido;
        $escolar->segundoapellido = $escolar->segundoapellido;
        $escolar->primernombre = $escolar->primernombre;
        $escolar->segundonombre = $escolar->segundonombre;
        $escolar->enumerodecelular = $request->input('enumerodecelular');
        $escolar->eedad = $request->input('eedad');
        $escolar->procedencia = $request->input('procedencia');
        $escolar->tiempolectivo = $request->input('tiempolectivo');
        $escolar->telelectivo = $request->input('telelectivo');
        $escolar->noelectivo = $request->input('noelectivo');
        $escolar->telnoelectivo = $request->input('telnoelectivo');
        $escolar->observaciones = $request->input('observaciones');

        $escolar->save();

        return redirect()->route('escolar.edit', $id);
    }
    

    public function editdos($id)
    {
        $escolar= Escolar::findOrFail($id);
        $alumnos = Alumno::findOrFail($id);
        $padres = Padre::findOrFail($id);
        return view('orientacion.escolar.formularioescolardos', compact('alumnos', 'escolar', 'padres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedos(Request $request, $id)
    {
        $escolar = Escolar::findOrFail($id);
        $request->validate([

        ]);

        // Actualiza los datos del formulario
        

        $escolar->save();

        return redirect()->route('escolar.editdos', $id);
    }

    public function edittres($id)
    {
        $escolar= Escolar::findOrFail($id);
        $alumnos = Alumno::findOrFail($id);
        return view('orientacion.escolar.formularioescolartres', compact('alumnos', 'escolar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatetres(Request $request, $id)
    {
        $escolar = Escolar::findOrFail($id);
        $request->validate([
              // Verifica que el alumno_id exista en la tabla 'alumnos'
            // Resto de las validaciones...
        ]);
        // Aquí puedes validar los datos del formulario antes de actualizarlos
        // $request->validate([...]);

        // Actualiza los datos del formulario
        $escolar->situacioneconomica = $request->input('situacioneconomica');
        $escolar->casavives = $request->input('casavives');
        $escolar->computadora = $request->has('computadora') ? true : false;
        $escolar->tablet = $request->has('tablet') ? true : false;
        $escolar->celular = $request->has('celular') ? true : false;
        $escolar->internet = $request->has('internet') ? true : false;
        $escolar->otroscasa = $request->has('otroscasa') ? true : false;
        $escolar->talla = $request->input('talla');
        $escolar->peso = $request->input('peso');
        $escolar->hatenido = $request->input('hatenido');
        $escolar->tiene = $request->input('tiene');
        $escolar->ver = $request->input('ver');
        $escolar->verespecifique = $request->input('verespecifique');
        $escolar->vercorregida = $request->input('vercorregida');
        $escolar->escuchar = $request->input('escuchar');
        $escolar->escucharespecifique = $request->input('escucharespecifique');
        $escolar->escucharcorregida = $request->input('escucharcorregida');
        $escolar->estadodentadura = $request->input('estadodentadura');
        $escolar->recibidovacuna = $request->input('recibidovacuna');

        $escolar->save();

        return redirect()->route('escolar.edittres', $id);
    }

    public function editcuatro($id)
    {
        $escolar= Escolar::findOrFail($id);
        $alumnos = Alumno::findOrFail($id);
        return view('orientacion.escolar.formularioescolarcuatro', compact('alumnos', 'escolar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecuatro(Request $request, $id)
    {
        $escolar = Escolar::findOrFail($id);
        $request->validate([
              // Verifica que el alumno_id exista en la tabla 'alumnos'
            // Resto de las validaciones...
        ]);

        // Actualiza los datos del formulario
        $escolar->abanda = $request->has('abanda') ? true : false;
        $escolar->afutbol = $request->has('afutbol') ? true : false;
        $escolar->apingpong = $request->has('apingpong') ? true : false;
        $escolar->anumeros = $request->has('anumeros') ? true : false;
        $escolar->alectura = $request->has('alectura') ? true : false;
        $escolar->acoro = $request->has('acoro') ? true : false;
        $escolar->abasket = $request->has('abasket') ? true : false;
        $escolar->atennis = $request->has('atennis') ? true : false;
        $escolar->amanuales = $request->has('amanuales') ? true : false;
        $escolar->aoratoria = $request->has('aoratoria') ? true : false;
        $escolar->avolley = $request->has('avolley') ? true : false;
        $escolar->aatletismo = $request->has('aatletismo') ? true : false;
        $escolar->adomestico = $request->has('adomestico') ? true : false;
        $escolar->aanimales = $request->has('aanimales') ? true : false;
        $escolar->adibujo = $request->has('adibujo') ? true : false;
        $escolar->afiestas = $request->has('afiestas') ? true : false;
        $escolar->acientificos = $request->has('acientificos') ? true : false;
        $escolar->aenfermos = $request->has('aenfermos') ? true : false;
        $escolar->aotros = $request->has('aotros') ? true : false;
        $escolar->trabajar = $request->input('trabajar');
        $escolar->namigos = $request->input('namigos');
        $escolar->pasatiempos1 = $request->input('pasatiempos1');
        $escolar->pasatiempos2 = $request->input('pasatiempos2');
        $escolar->pasatiempos3 = $request->input('pasatiempos3');
        $escolar->edadamigos = $request->input('edadamigos');

        $escolar->save();

        return redirect()->route('escolar.editcuatro', $id);
    }

    public function editcinco($id)
    {
        $escolar= Escolar::findOrFail($id);
        $alumnos = Alumno::findOrFail($id);
        return view('orientacion.escolar.formularioescolarcinco', compact('alumnos', 'escolar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecinco(Request $request, $id)
    {
        $escolar = Escolar::findOrFail($id);
        $request->validate([
              // Verifica que el alumno_id exista en la tabla 'alumnos'
            // Resto de las validaciones...
        ]);
        // Aquí puedes validar los datos del formulario antes de actualizarlos
        // $request->validate([...]);

        // Actualiza los datos del formulario
        $escolar->estudios = $request->input('estudios');
        $escolar->repetido = $request->input('repetido');
        $escolar->claseestudiante = $request->input('claseestudiante');
        $escolar->agrado = $request->input('agrado');
        $escolar->agradomenos = $request->input('agradomenos');
        $escolar->considera = $request->input('considera');
        $escolar->horasextra = $request->input('horasextra');
        $escolar->tiempolibre = $request->input('tiempolibre');
        $escolar->rendimiento = $request->input('rendimiento');
        $escolar->ayudarsele = $request->input('ayudarsele');
        $escolar->cursosrepetidos = $request->input('cursosrepetidos');
        $escolar->materiasreprobadas = $request->input('materiasreprobadas');
        $escolar->materiasagradan = $request->input('materiasagradan');
        $escolar->atribuyeagrado = $request->input('atribuyeagrado');
        $escolar->agradanmenos = $request->input('agradanmenos');
        $escolar->materiasdificultad = $request->input('materiasdificultad');
        $escolar->culturageneral = $request->input('culturageneral');
        $escolar->diversificado = $request->input('diversificado');

        $escolar->save();

        return redirect()->route('escolar.editcinco', $id);
    }

    public function editseis($id)
    {
        $escolar= Escolar::findOrFail($id);
        $alumnos = Alumno::findOrFail($id);
        return view('orientacion.escolar.formularioescolarseis', compact('alumnos', 'escolar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateseis(Request $request, $id)
    {
        $escolar = Escolar::findOrFail($id);
        $request->validate([
              // Verifica que el alumno_id exista en la tabla 'alumnos'
            // Resto de las validaciones...
        ]);

        $escolar->pbienconud = $request->input('pbienconud');
        $escolar->hablarconel = $request->input('hablarconel');
        $escolar->psolucion = $request->input('psolucion');
        $escolar->pconfianza = $request->input('pconfianza');
        $escolar->mbienconud = $request->input('mbienconud');
        $escolar->hablarconella = $request->input('hablarconella');
        $escolar->msolucion = $request->input('msolucion');
        $escolar->mconfianza = $request->input('mconfianza');
        $escolar->pcomprensivo = $request->has('pcomprensivo') ? true : false;
        $escolar->mcomprensivo = $request->has('mcomprensivo') ? true : false;
        $escolar->ecomprensivo = $request->has('ecomprensivo') ? true : false;
        $escolar->pbondadoso = $request->has('pbondadoso') ? true : false;
        $escolar->mbondadoso = $request->has('mbondadoso') ? true : false;
        $escolar->ebondadoso = $request->has('ebondadoso') ? true : false;
        $escolar->pfuete = $request->has('pfuete') ? true : false;
        $escolar->mfuete = $request->has('mfuete') ? true : false;
        $escolar->efuete = $request->has('efuete') ? true : false;
        $escolar->pestricto = $request->has('pestricto') ? true : false;
        $escolar->mestricto = $request->has('mestricto') ? true : false;
        $escolar->eestricto = $request->has('eestricto') ? true : false;
        $escolar->ptolerante = $request->has('ptolerante') ? true : false;
        $escolar->mtolerante = $request->has('mtolerante') ? true : false;
        $escolar->etolerante = $request->has('etolerante') ? true : false;
        $escolar->pcomunicativo = $request->has('pcomunicativo') ? true : false;
        $escolar->mcomunicativo = $request->has('mcomunicativo') ? true : false;
        $escolar->ecomunicativo = $request->has('ecomunicativo') ? true : false;
        $escolar->pproblemas = $request->has('pproblemas') ? true : false;
        $escolar->mproblemas = $request->has('mproblemas') ? true : false;
        $escolar->eproblemas = $request->has('eproblemas') ? true : false;
        $escolar->pestudio = $request->has('pestudio') ? true : false;
        $escolar->mestudio = $request->has('mestudio') ? true : false;
        $escolar->eestudio = $request->has('eestudio') ? true : false;
        $escolar->plibertades = $request->has('plibertades') ? true : false;
        $escolar->mlibertades = $request->has('mlibertades') ? true : false;
        $escolar->elibertades = $request->has('elibertades') ? true : false;
        $escolar->pfuturo = $request->has('pfuturo') ? true : false;
        $escolar->mfuturo = $request->has('mfuturo') ? true : false;
        $escolar->efuturo = $request->has('efuturo') ? true : false;
        $escolar->pgrande = $request->has('pgrande') ? true : false;
        $escolar->mgrande = $request->has('mgrande') ? true : false;
        $escolar->egrande = $request->has('egrande') ? true : false;
        $escolar->pleve = $request->has('pleve') ? true : false;
        $escolar->mleve = $request->has('mleve') ? true : false;
        $escolar->eleve = $request->has('eleve') ? true : false;
        $escolar->nopapa = $request->input('nopapa');
        $escolar->nomama = $request->input('nomama');
        $escolar->relaciones = $request->input('relaciones');

        $escolar->save();

        return redirect()->route('escolar.editseis', $id);
    }

    public function editsiete($id)
    {
        $escolar= Escolar::findOrFail($id);
        $alumnos = Alumno::findOrFail($id);
        return view('orientacion.escolar.formularioescolarsiete', compact('alumnos', 'escolar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatesiete(Request $request, $id)
    {
        $escolar = Escolar::findOrFail($id);
        $request->validate([
              // Verifica que el alumno_id exista en la tabla 'alumnos'
            // Resto de las validaciones...
        ]);
        $escolar->triste = $request->input('triste');
        $escolar->llora = $request->input('llora');
        $escolar->preocupado = $request->input('preocupado');
        $escolar->nervioso = $request->input('nervioso');
        $escolar->solo = $request->input('solo');
        $escolar->debil = $request->input('debil');
        $escolar->amistoso = $request->input('amistoso');
        $escolar->carinioso = $request->input('carinioso');
        $escolar->timido = $request->input('timido');
        $escolar->testarudo = $request->input('testarudo');
        $escolar->tranquilo = $request->input('tranquilo');
        $escolar->puntual = $request->input('puntual');
        $escolar->egoista = $request->input('egoista');
        $escolar->celoso = $request->input('celoso');
        $escolar->violento = $request->input('violento');
        $escolar->agresivo = $request->input('agresivo');
        $escolar->comprensivo = $request->input('comprensivo');
        $escolar->ordenado = $request->input('ordenado');
        $escolar->comunicativo = $request->input('comunicativo');
        $escolar->religioso = $request->input('religioso');
        $escolar->futuro = $request->input('futuro');
        $escolar->retraido = $request->input('retraido');
        $escolar->cooperador = $request->input('cooperador');

        $escolar->save();

        return redirect()->route('escolar.editsiete', $id);
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
