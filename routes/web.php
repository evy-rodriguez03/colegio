<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\dashboardsecController;
use App\Http\Controllers\PeriodomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InicioController;
use App\Http\controllers\PaneltesoreriaController;
use App\Http\controllers\requisitoController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\PagoaRealizaraController;
use App\Http\controllers\CursoController;
use App\Http\controllers\RetrasadaController;
use App\Http\controllers\CompromisoController;
use App\Http\Middleware\VerificarPeriodoMatricula;

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
route::delete('/usuarios/{usuarios}', [UserController::class,'destroy'])->name('usuarios.destroy');

    /*Rutas inicio y cieree de matricula */
Route::get('/prinperiodo', [PeriodomController::class,'index'])->name('periodo');
 
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
Route::get('/indexcompromiso', [CompromisoController::class,'index'])->name('indexcompromiso.index');

//ruta matricula completa
Route::get('/creatematricula',[AlumnoController::class, 'creatematricula'])->name('creatematricula')->middleware(VerificarPeriodoMatricula::class);
Route::post('/storematricula', [AlumnoController::class, 'storematricula'])->name('submitmatricula');

route::get('/alumnopadre', [PadreController::class,'createdatospadre'])->name('datospadre.create');
route::post('/alumnopadre', [PadreController::class,'storeconpadre'])->name('submitpadre');

route::get('/alumnomadre', [PadreController::class,'createdatosmadre'])->name('datosmadre.create');
route::post('/alumnmadre', [PadreController::class,'storeconmadre'])->name('submitmadre');

route::get('/alumnoencargado', [PadreController::class,'createdatosencargado'])->name('datosencargado.create');
route::post('/alumnencargado', [PadreController::class,'storeconencargado'])->name('submitencargado');



//rutas Padres
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
});

//ruta de pago a realizar 
route::get('/tesoreriapago', [PagoaRealizaraController::class,'index'])->name('pagorealizar.index');
route::post('/pagorealizar', [PagoaRealizaraController::class,'store']);
 

//rutas Retrasadas
route::get('/retrasadas', [RetrasadaController::class,'index'])->name('retrasadas.index');
route::get('/retrasadas/crear', [RetrasadaController::class,'create'])->name('retrasadas.create');
route::get('/retrasadas/{retrasadas}/edit', [RetrasadaController::class,'edit'])->name('retrasadas.edit');
route::post('/retrasadas', [RetrasadaController::class,'sendData']);
route::put('/retrasadas/{retrasadas}', [RetrasadaController::class,'update'])->name('retrasadas.update');
route::delete('/retrasadas/{retrasadas}', [RetrasadaController::class,'destroy'])->name('retrasadas.destroy'); 