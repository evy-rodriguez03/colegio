<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\RegisterController;
use App\Http\controllers\SessionsController;


Route::get('/', function () {
    return view('Home');
});

/*Ruta de Login */

Route::get('/login', [SessionsController::class, 
'create'])->name('login.index');

Route::get('/register', [RegisterController::class,
 'store'])->name('register.index');



