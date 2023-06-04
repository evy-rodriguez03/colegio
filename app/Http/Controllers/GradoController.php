<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;

class GradoController extends Controller
{
   

    public function create()
    {
        return view('configurar.grado');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        Grado::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect('/grados')->with('success', 'Grado creado exitosamente.');
    }
}
