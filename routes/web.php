<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\dashboardsecController;
use App\Http\Controllers\PeriodomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\CierreController;
use App\Http\controllers\PaneltesoreriaController;
use App\Http\controllers\requisitoController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\PagoaRealizaraController;
use App\Http\controllers\CursoController;
use App\Http\controllers\RetrasadaController;

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
    Route::get('/prinperiodo', [PeriodomController::class,
    'index'])->name('periodo');
 
    route::get('/iniciom', [InicioController::class,'create'])->name('inicio.create');
    route::post('/iniciom', [InicioController::class,'store'])->name('inicio.store');

    route::get('/cierrem', [CierreController::class,'create'])->name('cierre.create');
    route::post('/cierrem', [CierreController::class,'store'])->name('cierre.store');

/*Ruta del boton requisitos*/
Route::get('/requisito', [requisitoController::class, 
'create'])->name('requisito.index');

Route::get('/requisito', [requisitoController::class, 
'create'])->name('requisito.index');

Route::resource('cursos','App\Http\Controllers\CursoController');


//rutas Padres
route::get('/padres', [PadreController::class,'index'])->name('padres.index');
route::get('/padres/crear', [PadreController::class,'create'])->name('padres.create');
route::get('/padres/{padres}/edit', [PadreController::class,'edit'])->name('padres.edit');
route::post('/padres', [PadreController::class,'sendData']);
route::put('/padres/{padres}', [PadreController::class,'update'])->name('padres.update');
route::delete('/padres/{padres}', [PadreController::class,'destroy'])->name('padres.destroy');

//ruta alumnos
route::get('/alumnos', [AlumnoController::class,'index'])->name('alumnos.index');
route::get('/alumnos/crear', [AlumnoController::class,'create'])->name('alumnos.create');
route::get('/alumnos/{alumnos}/edit', [AlumnoController::class,'edit'])->name('alumnos.edit');
route::post('/alumnos', [AlumnoController::class,'store']);
route::put('/alumnos/{usuarios}', [AlumnoController::class,'update'])->name('alumnos.update');
route::delete('/alumnos/{alumnos}', [AlumnoController::class,'destroy'])->name('alumnos.destroy');
route::get('/alumnos/pdf', [AlumnoController::class,'pdf'])->name('alumnos.pdf');
});

//ruta de pago a realizar 
route::get('/tesoreriapago', [PagoaRealizaraController::class,'index'])->name('pagorealizar.index');

//rutas Retrasadas
route::get('/retrasadas', [RetrasadaController::class,'index'])->name('retrasadas.index');
route::get('/retrasadas/crear', [RetrasadaController::class,'create'])->name('retrasadas.create');
route::get('/retrasadas/{retrasadas}/edit', [RetrasadaController::class,'edit'])->name('retrasadas.edit');
route::post('/retrasadas', [RetrasadaController::class,'sendData']);
route::put('/retrasadas/{retrasadas}', [RetrasadaController::class,'update'])->name('retrasadas.update');
route::delete('/retrasadas/{retrasadas}', [RetrasadaController::class,'destroy'])->name('retrasadas.destroy');