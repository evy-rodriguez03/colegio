<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
   public function create(){
    return view('auth.register');
   }

   public function store(){
      if(auth ()->attempt (request (['name', 'email', 'password']) == false )){ 
         return back()->withErrors(['message'=> 'El correo y la contraseña es incorrecto']);
      }
      
   }
}
