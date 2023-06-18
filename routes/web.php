<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\dashboardsecController;
use App\Http\Controllers\PeriodomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PaneltesoreriaController;
use App\Http\Controllers\requisitoController;
use App\Http\Controllers\PagoaRealizaraController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\RetrasadaController;
use App\Http\Controllers\CompromisoController;
use App\Http\Controllers\HorarioController;
use App\Http\Middleware\VerificarPeriodoMatricula;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ImagenEController;
use App\Http\Controllers\IngresarController;
use App\Http\Controllers\ExistenteController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ParientetransporteController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\PanelorientacionController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\formularioescolarController;
use App\Http\Controllers\FirmacontratotesoreriaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\CursostotalesController;
use App\Http\Controllers\vistapagoController;
use App\Http\Controllers\FormularioescolardosController;
use App\Http\Controllers\FormularioescolartresController;
use App\Http\Controllers\FormularioescolarcuatroController;
use App\Http\Controllers\FormularioescolarcincoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Ruta del dashboar login*/
Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [DashboardController::class,
    'index'])
    ->name('dashboard.index');
});

Route::group(['middleware' => ['auth','Admin']], function () {


    /*Ruta del dashboard secretaria*/
    Route::get('/dashboardsec', [dashboardsecController::class,
    'create'])->name('dashboardsec.index');

    /*Rutas de los paneles */
    Route::get('/dashboard', [dashboardsecController::class,
    'create'])->name('dashboardsec.index');
    route::get('/tesoreria',[PaneltesoreriaController::class,'index'])->name('paneltesoreria.index');


    /*rutas usuario*/
route::get('/usuarios', [UserController::class,'index'])->name('usuarios.index');
route::get('/usuarios/crear', [UserController::class,'create'])->name('usuarios.create');
route::get('/usuarios/{usuarios}/edit', [UserController::class,'edit'])->name('usuarios.edit');
route::post('/usuarios', [UserController::class,'sendData']);
route::put('/usuarios/{usuarios}', [UserController::class,'update'])->name('usuarios.update');
Route::put('/usuarios/{usuarios}/deshabilitar', [UserController::class,'deshabilitar'])->name('usuarios.deshabilitar');
Route::post('/usuarios/{usuario}/habilitar', [UserController::class,'habilitar'])->name('usuarios.habilitar');
route::delete('/usuarios/{usuarios}', [UserController::class,'destroy'])->name('usuarios.destroy');

    /*Rutas inicio y cieree de matricula */
Route::get('/prinperiodo', [PeriodomController::class,'index'])->name('periodo')
->middleware(VerificarPeriodoMatricula::class);

Route::get('/iniciom', [InicioController::class,'create'])->name('inicio.create');
Route::post('/iniciom', [InicioController::class,'store'])->name('inicio.store');

/*Ruta del boton requisitos*/
Route::get('/requisito', [requisitoController::class,
'create'])->name('requisito.index');

Route::get('/requisito', [requisitoController::class,
'create'])->name('requisito.index');

Route::get('/cursos/pdf', [CursoController::class,'pdf'])->name('cursos.pdf');
Route::resource('cursos','App\Http\Controllers\CursoController');

//compromiso
Route::get('/indexcompromiso', [CompromisoController::class,'create'])->name('indexcompromiso.create');
route::post('/indexcompromiso', [CompromisoController::class,'store'])->name('indexcompromiso.store');

//ruta matricula completa
Route::get('/creatematricula/{id?}',[AlumnoController::class, 'creatematricula'])->name('creatematricula')
->middleware(VerificarPeriodoMatricula::class);
Route::post('/storematricula', [AlumnoController::class, 'storematricula'])->name('submitmatricula');
route::get('/alumnopadre', [PadreController::class,'createdatospadre'])->name('datospadre.create');
route::post('/alumnopadre', [PadreController::class,'storeconpadre'])->name('submitpadre');
route::get('/alumnomadre', [PadreController::class,'createdatosmadre'])->name('datosmadre.create');
route::post('/alumnmadre', [PadreController::class,'storeconmadre'])->name('submitmadre');
route::get('/alumnoencargado', [PadreController::class,'createdatosencargado'])->name('datosencargado.create');
route::post('/alumnencargado', [PadreController::class,'storeconencargado'])->name('submitencargado');
route::get('/parientetransporte', [ParientetransporteController::class,'index'])->name('parientetransporte');


route::get('/terminar_matricula', [PadreController::class,'terminar_matricula'])->name('terminar_matricula');



//RUTAS PADRES
route::get('/padres/pdf', [PadreController::class,'pdf'])->name('padre.pdf');
route::get('/padres', [PadreController::class,'index'])->name('padres.index');
route::get('/padres/crear', [PadreController::class,'create'])->name('padres.create');
route::get('/padres/{padres}/edit', [PadreController::class,'edit'])->name('padres.edit');
route::post('/padres', [PadreController::class,'store']);
route::put('/padres/{padres}', [PadreController::class,'update'])->name('padres.update');
route::delete('/padres/{padres}', [PadreController::class,'destroy'])->name('padres.destroy');
route::get('/padres/{id}', [PadreController::class,'show'])->name('padre.show');



//ruta alumnos
route::get('/alumnos', [AlumnoController::class,'index'])->name('alumnos.index');
route::get('/alumnos/crear', [AlumnoController::class,'create'])->name('alumnos.create');
route::get('/alumnos/{alumnos}/edit', [AlumnoController::class,'edit'])->name('alumnos.edit');
route::post('/alumnos', [AlumnoController::class,'store']);
route::put('/alumnos/{alumnos}', [AlumnoController::class,'update'])->name('alumnos.update');
route::get('/alumnos/pdf', [AlumnoController::class,'pdf'])->name('alumnos.pdf');
route::get('/alumnos/{alumnos}', [AlumnoController::class,'show'])->name('alumnos.show');
route::delete('/alumnos/{alumnos}',[AlumnoController::class,'destroy'])->name('alumnos.destroy');
route::post('/comprobar/matricula', [AlumnoController::class,'comprobar'])->name('comprobar.alumno');
});

//RUTA PAGO A REALIZAR
route::get('/tesoreriapago', [PagoaRealizaraController::class,'index'])->name('pagorealizar.index');
route::post('/pagorealizar', [PagoaRealizaraController::class,'store']);

//RUTAS RETRASADA
route::get('/retrasadas', [RetrasadaController::class,'index'])->name('retrasadas.index');
route::get('/retrasadas/crear', [RetrasadaController::class,'create'])->name('retrasadas.create');
route::get('/retrasadas/{retrasadas}/edit', [RetrasadaController::class,'edit'])->name('retrasadas.edit');
route::post('/retrasadas', [RetrasadaController::class,'sendData']);
route::put('/retrasadas/{retrasadas}', [RetrasadaController::class,'update'])->name('retrasadas.update');
route::delete('/retrasadas/{retrasadas}', [RetrasadaController::class,'destroy'])->name('retrasadas.destroy');

//RUTA DEL PERFIL
Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
Route::get('/editar-profile', [UserProfileController::class, 'index'])->name('profile.edit');
route::put('/profile/{id}', [UserProfileController::class,'updateprofile'])->name('profile.update');
route::get('/profile/{usuarios}/edit', [UserProfileController::class,'editprofile'])->name('profile.editar');

//RUTA DE LA IMAGEN DE PERFIL
Route::get('/imagenE', [ImagenEController::class,'create'])->name('imagenE.index');
Route::post('/imageE', [ ImagenEController::class, 'store' ])->name('image.store');
Route::get('/imagenE', [ImagenEController::class,'index'])->name('imagenE.index');
Route::delete('/imagenE/{id}', [ImagenEController::class,'destroy'])->name('imagenE.destroy');

//RUTA DE INGRESAR ALUMNO
route::get('/ingresar', [IngresarController::class,'index'])->name('ingresar.index');

//RUTA DE  ALUMNO EXISTENTE
route::get('/existente', [ExistenteController::class,'index'])->name('existente.index');

//RUTA DE LA VISTA PRINCIPAL DEL BOTON INGRESAR Y EXISTENTE
route::get('/principal', [PrincipalController::class,'index'])->name('principal.create');
Route::post('/periodo/{id}/cancelar', [PrincipalController::class, 'cancelarPeriodo'])->name('periodo.cancelar');

//Rutas Horario de clase
Route::get('/horarioc', [HorarioController::class, 'index'])->name('horario.index');
Route::get('/horarioc/create', [HorarioController::class, 'create'])->name('horario.create');
Route::post('/horarioc', [HorarioController::class, 'store'])->name('horario.store');
Route::delete('/horarioc/{id}', [HorarioController::class, 'destroy'])->name('horario.destroy');
Route::get('/horarioc/{id}/edit', [HorarioController::class, 'edit'])->name('horario.edit');
Route::put('/horarioc/{id}', [HorarioController::class, 'update'])->name('horario.update');


//Ruta de Seccion
Route::get('/indexsec', [SeccionController::class, 'index'])->name('secciones.index');
Route::get('/indexsec/create', [SeccionController::class, 'create'])->name('secciones.create');
Route::post('/indexsec', [SeccionController::class, 'store'])->name('secciones.store');
Route::get('/indexsec/{seccion}', [SeccionController::class, 'show'])->name('secciones.show');
Route::get('/indexsec/{seccion}/edit', [SeccionController::class, 'edit'])->name('secciones.edit');
Route::put('/indexsec/{seccion}', [SeccionController::class, 'update'])->name('secciones.update');
Route::delete('/indexsec/{seccion}', [SeccionController::class, 'destroy'])->name('secciones.destroy');
//Ruta del dashboard orientacion
 Route::get('/paneldeorientacion', [PanelorientacionController::class,'index'])->name('panelorientacion.index');

 //Rutas reporte
Route::get('/repindex', [ReportesController::class, 'index'])->name('reportes.index');
route::get('/listalumno/pdf', [ReportesController::class,'pdf'])->name('repalumno.pdf');
route::get('/listapadre/pdf2', [ReportesController::class,'pdf2'])->name('repadre.pdf');

//Rutas consejeria
route::get('/consjindex', [SecretariaController::class,'index'])->name('consejeria.index');


//Rutas consfiguracion
Route::get('/index', [ConfiguracionController::class,'index'])->name('configuracion.index');
Route::get('/indexJornada', [ConfiguracionController::class,'indexJornada'])->name('jornada.index');
Route::get('/jornada', [ConfiguracionController::class, 'createJornada'])->name('jornada.create');
Route::post('/jornada', [ConfiguracionController::class,'store'])->name('jornadas.store');
Route::get('/indexgrado', [GradoController::class,'index'])->name('grados.index');
Route::get('/grado/create', [GradoController::class, 'create'])->name('grados.create');
Route::post('/grado', [GradoController::class, 'store'])->name('grados.store');

//RUTAS DEL FORMULARIO ESCOLAR Y COLEGIO ORIENTACION
Route::get('/escolar', [formularioescolarController::class,'index'])->name('escolar.index');
route::get('/escolar/pdf', [formularioescolarController::class,'pdf'])->name('escolar.pdf');
route::get('/escolar/crear', [formularioescolarController::class,'create'])->name('escolar.create');
route::get('/padres/{escolar}/edit', [formularioescolarController::class,'edit'])->name('escolar.edit');
route::post('/escolar', [formularioescolarController::class,'store']);
route::put('/escolar/{escolar}', [formularioescolarController::class,'update'])->name('escolar.update');
route::delete('/escolar/{escolar}', [formularioescolarController::class,'destroy'])->name('escolar.destroy');
route::get('/escolar/{id}', [formularioescolarController::class,'show'])->name('escolar.show');

//contrato tesoreria
Route::get('/firmacontratotesoreria', [FirmacontratotesoreriaController::class,'create'])->name('firmacontratotesoreria.create');
route::post('/firmacontratotesoreria', [FirmacontratotesoreriaController::class,'store'])->name('firmacontratotesoreria.store');

//RUTAS DEL FORMULARIO DE PRE-ESCOLAR ORIENTACION
Route::get('/preescolar', [formulariopreescolarController::class,'index'])->name('preescolarindex.index');

//cursostotales
Route::get('/cursostotal', [CursostotalesController::class,'index'])->name('cursostotales.index');

//Tesoreria
route::get('/tesoreriavistapago', [vistapagoController::class,'index'])->name('vistapago.index');
route::post('/vistapagorealizar', [vistapagoController::class,'store']);

//Formularios
route::get('/escolardos', [FormularioescolardosController::class,'createescolardos'])->name('escolardos.create');
route::post('/escolar', [FormularioescolardosController::class,'storeescolardos'])->name('submitescolardos');

route::get('/escolartres', [FormularioescolartresController::class,'createescolartres'])->name('escolartres.create');
route::post('/escolar', [FormularioescolartresController::class,'storeescolartres'])->name('submitescolartres');

route::get('/escolarcuatro', [FormularioescolarcuatroController::class,'createescolarcuatro'])->name('escolarcuatro.create');
route::post('/escolar', [FormularioescolarcuatroController::class,'storeescolarcuatro'])->name('submitescolarcuatro');

route::get('/escolarcinco', [FormularioescolarcincoController::class,'createescolarcinco'])->name('escolarcinco.create');
route::post('/escolar', [FormularioescolarcincoController::class,'storeescolarcinco'])->name('submitescolarcinco');