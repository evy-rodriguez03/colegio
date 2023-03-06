<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requisitoController extends Controller
{
    public function create(){
        return view('secretaria/requisito');
       }
}
