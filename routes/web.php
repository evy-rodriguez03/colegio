<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\SessionsController;
use App\Http\controllers\DashboardController;


Route::get('/', function () {
    return view('Home');
});

/*Ruta de Login */
Route::get('/login', [SessionsController::class, 
'create'])->name('login.index');

Route::get('/dashboard', [DashboardController::class, 
'create'])->name('dashboard.index');
 


