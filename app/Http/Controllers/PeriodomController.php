<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodomController extends Controller
{
    public function index()
{
    $periodos = Periodo::all();
    return view('Administracion.prinperiodo', ['periodos' => $periodos]);
}
}