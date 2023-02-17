<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardsecController extends Controller
{
    public function create(){
        return view('secretaria/dashboardsec');
       }
}
