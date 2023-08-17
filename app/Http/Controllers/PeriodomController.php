<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodomController extends Controller
{
    public function index()
{
    $periodos = Periodo::all();
    $periodoActivo = Periodo::where('activo', 1)->first();
    return view('Administracion.prinperiodo', compact('periodos','periodoActivo'));
}
}