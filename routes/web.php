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
route::get('/usuarios', [UsuarioController::class,'index'])->name('usuarios.index');
route::get('/usuarios/crear', [UsuarioController::class,'create'])->name('usuarios.create');
route::get('/usuarios/{usuario}/edit', [UsuarioController::class,'edit'])->name('usuarios.edit');
route::post('/usuarios', [UsuarioController::class,'sendData']);

/*Rutas inicio y cieree de matricula */
Route::get('/prinperiodo', [PeriodomController::class, 
'create'])->name('periodo');

Route::get('/iniciom', [IniciomController::class, 
'create'])->name('inicio');

Route::get('/cierrem', [FinalizarController::class, 
'create'])->name('cierre');

/*(Calendario)*/
Route::get('evento/form','ControllerEvent@form')->name('evento.index');
Route::post('evento/create','ControllerEvent@create');
Route::get('evento/details/{id}','ControllerEvent@details');
Route::get('evento/index','ControllerEvent@index');
Route::get('evento/index/{month}','ControllerEvent@index_month');
Route::post('evento/calendario','ControllerEvent@calendario');
