<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::all();
        return view('configurar.Grado.indexgrado', compact('grados'));
    }

    public function create()
    {
        return view('configurar.Grado.grado');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $grado = new Grado();
        $grado->nombre = $request->input('nombre');
        $grado->descripcion = $request->input('descripcion');
        $grado->save();

        return redirect()->route('grados.index')->with('success', 'Grado creado exitosamente.');
    }
    public function edit($id)
    {
        $grado = Grado::find($id);
        return view('configurar.Grado.editar', compact('grado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $grado = Grado::find($id);
        $grado->nombre = $request->input('nombre');
        $grado->descripcion = $request->input('descripcion');
        $grado->save();

        return redirect()->route('grados.index')->with('success', 'Grado actualizado exitosamente.');
    }

    public function destroy($id)
    {
    
        $grado = Grado::find($id);

        if (!$grado) {
            return redirect()->route('grados.index')->with('error', 'Grado no encontrado.');
        }
        $grado->delete();

        return redirect()->route('grados.index')->with('success', 'Grado eliminado exitosamente.');
    }

}