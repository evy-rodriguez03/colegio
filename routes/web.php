<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\SessionsController;
use App\Http\controllers\DashboardController;
use App\Http\controllers\UsuarioController;
use App\Http\controllers\dashboardsecController;
use App\Http\controllers\PeriodomController;
use App\Http\controllers\IniciomController;
use App\Http\controllers\FinalizarController;
use App\Http\controllers\ControllerEvent;
use App\Http\controllers\AlumnoController;
use App\Http\controllers\PadreController;


/*Ruta de Login */

Route::get('/', function ()
 {return view('Home');});

Route::get('/login', [SessionsController::class, 
'create'])->name('login.index');

Route::post('/dashboard', [DashboardController::class, 
'create'])->name('dashboard.index');

 /*Ruta del dashboar secretaria*/
Route::get('/dashboardsec', [dashboardsecController::class, 
'create'])->name('dashboardsec.index');

//rutas usuario
route::get('/usuarios', [UsuarioController::Class,'index'])->name('usuarios.index');
route::get('/usuarios/crear', [UsuarioController::Class,'create'])->name('usuarios.create');
route::get('/usuarios/{usuarios}/edit', [UsuarioController::Class,'edit'])->name('usuarios.edit');
route::post('/usuarios', [UsuarioController::Class,'sendData']);
route::put('/usuarios/{usuarios}', [UsuarioController::Class,'update'])->name('usuarios.update');
route::delete('/usuarios/{usuarios}', [UsuarioController::Class,'destroy'])->name('usuarios.destroy');

/*Rutas inicio y cieree de matricula */
Route::get('/prinperiodo', [PeriodomController::class, 
'create'])->name('periodo');

Route::get('/iniciom', [IniciomController::class, 
'create'])->name('inicio');

Route::get('/cierrem', [FinalizarController::class, 
'create'])->name('cierre');

/*(Calendario)*/
Route::get('evento/form','ControllerEvent@form');
Route::post('evento/create','ControllerEvent@create');
Route::get('evento/details/{id}','ControllerEvent@details');
Route::get('evento/index','ControllerEvent@index');
Route::get('evento/index/{month}','ControllerEvent@index_month');
Route::post('evento/calendario','ControllerEvent@calendario');











































//rutas Padres
route::get('/padres', [PadreController::Class,'index'])->name('padres.index');
route::get('/padres/crear', [PadreController::Class,'create'])->name('padres.create');
route::get('/padres/{padres}/edit', [PadreController::Class,'edit'])->name('padres.edit');
route::post('/padres', [PadreController::Class,'sendData']);
route::put('/padres/{padres}', [PadreController::Class,'update'])->name('padres.update');
route::delete('/padres/{padres}', [PadreController::Class,'destroy'])->name('padres.destroy');

//ruta alumnos
route::get('/alumnos', [AlumnoController::Class,'index'])->name('alumnos.index');
route::get('/alumnos/crear', [AlumnoController::Class,'create'])->name('alumnos.create');
route::get('/alumnos/{alumnos}/edit', [AlumnoController::Class,'edit'])->name('alumnos.edit');
route::post('/alumnos', [AlumnoController::Class,'sendData']);
route::put('/alumnos/{usuarios}', [AlumnoController::Class,'update'])->name('alumnos.update');
route::delete('/alumnos/{usuarios}', [AlumnoController::Class,'destroy'])->name('alumnos.destroy');