<?php

use App\Http\Controllers\DashboardController;
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

    /*Ruta del dashboar secretaria*/
    Route::get('/dashboardsec', [dashboardsecController::class,
    'create'])->name('dashboardsec.index');

    
    /*rutas usuario*/
route::get('/usuarios', [UsuarioController::class,'index'])->name('usuarios.index');
route::get('/usuarios/crear', [UsuarioController::class,'create'])->name('usuarios.create');
route::get('/usuarios/{usuarios}/edit', [UsuarioController::class,'edit'])->name('usuarios.edit');
route::post('/usuarios', [UsuarioController::class,'sendData']);
route::put('/usuarios/{usuarios}', [UsuarioController::class,'update'])->name('usuarios.update');
route::delete('/usuarios/{usuarios}', [UsuarioController::class,'destroy'])->name('usuarios.destroy');


    /*Rutas inicio y cieree de matricula */
    Route::get('/prinperiodo', [PeriodomController::class,
    'index'])->name('periodo');

    Route::get('/iniciom', [IniciomController::class,
    'index'])->name('inicio');

    Route::get('/cierrem', [FinalizarController::class,
    'index'])->name('cierre');
});
