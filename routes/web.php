<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\SessionsController;
use App\Http\controllers\UsuarioController;


Route::get('/', function () {
    return view('Home');
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



//rutas usuario
route::get('/usuarios', [UsuarioController::Class,'index'])->name('usuarios.index');

route::get('/usuarios/crear', [UsuarioController::Class,'create'])->name('usuarios.create');
route::get('/usuarios/{usuario}/edit', [UsuarioController::Class,'edit'])->name('usuarios.edit');
route::post('/usuarios', [UsuarioController::Class,'sendData']);

