<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodomController extends Controller
{
    public function index()
{
    $periodo = Periodo::all();
    return view('Administracion.prinperiodo', ['periodo' => $periodo]);
}
}