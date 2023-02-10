<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\RegisterController;
use App\Http\controllers\SessionsController;


Route::get('/', function () {
    return view('dashboard');
});

/*Ruta de Login */

Route::get('/login', [SessionsController::class, 
'create'])->name('login.index');

Route::post('/login', [RegisterController::class,
'store'])->name('login.index');


Route::get('/register', [RegisterController::class,
 'create'])->name('register.index');

 Route::post('/register', [RegisterController::class,
 'store'])->name('register.index');



