<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\dashboardsecController;
use App\Http\Controllers\FinalizarController;
use App\Http\Controllers\IniciomController;
use App\Http\Controllers\PeriodomController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

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

    /*Ruta del dashboard */
    Route::get('/dashboard', [dashboardsecController::class,
    'create'])->name('dashboard.index');
    
    /*rutas usuario*/
route::get('/usuarios', [UsuarioController::class,'index'])->name('usuarios.index');
route::get('/usuarios/crear', [UsuarioController::class,'create'])->name('usuarios.create');
route::get('/usuarios/{usuarios}/edit', [UsuarioController::class,'edit'])->name('usuarios.edit');
route::get('/usuarios/{usuarios}/edit', [UsuarioController::class,'edit'])->name('usuarios.edit');
route::post('/usuarios', [UsuarioController::class,'sendData']);
route::put('/usuarios/{usuarios}', [UsuarioController::class,'update'])->name('usuarios.update');
route::delete('/usuarios/{usuarios}', [UsuarioController::class,'destroy'])->name('usuarios.destroy');
route::put('/usuarios/{usuarios}', [UsuarioController::class,'update'])->name('usuarios.update');
route::delete('/usuarios/{usuarios}', [UsuarioController::class,'destroy'])->name('usuarios.destroy');

    /*Rutas inicio y cieree de matricula */
    Route::get('/prinperiodo', [PeriodomController::class,
    'index'])->name('periodo');
    /*Rutas inicio y cieree de matricula */
    Route::get('/prinperiodo', [PeriodomController::class,
    'index'])->name('periodo');

    Route::get('/iniciom', [IniciomController::class,
    'index'])->name('inicio');
    Route::get('/iniciom', [IniciomController::class,
    'index'])->name('inicio');

Route::get('/cierrem', [FinalizarController::class, 
'create'])->name('cierre');


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
route::post('/alumnos', [AlumnoController::class,'sendData']);
route::put('/alumnos/{usuarios}', [AlumnoController::class,'update'])->name('alumnos.update');

});

//ruta alumnos
route::get('/alumnos', [AlumnoController::Class,'index'])->name('alumnos.index');
route::get('/alumnos/crear', [AlumnoController::Class,'create'])->name('alumnos.create');
route::get('/alumnos/{alumnos}/edit', [AlumnoController::Class,'edit'])->name('alumnos.edit');
route::post('/alumnos', [AlumnoController::Class,'sendData']);
route::put('/alumnos/{usuarios}', [AlumnoController::Class,'update'])->name('alumnos.update');
});