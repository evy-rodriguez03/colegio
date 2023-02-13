<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\SessionsController;
use App\Http\controllers\DashboardController;
use App\Http\controllers\PeriodoelectivoController;


/*Ruta de Login */

Route::get('/', function ()
 {return view('Home');});

Route::get('/login', [SessionsController::class, 
'create'])->name('login.index');

Route::get('/dashboard', [DashboardController::class, 
'create'])->name('dashboard.index');

/*Ruta de Iniciar periodo electivo */
Route::get('/prinperiodo', [PeriodoelectivoController::class, 
'create'])->name('periodo.index');


