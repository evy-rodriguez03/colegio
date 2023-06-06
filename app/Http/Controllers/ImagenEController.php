<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;

class ImagenEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('pages.imagenE');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages/imagenE');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $user = User::findOrFail(Auth::user()->id);
        $user->imagen = 'images/'.$imageName;
        $user->save();


        return redirect()->route('profile')->with('success','Has subido correctamente la imagen.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        abort(404);
    }

    if (!$user->imagen) {
        abort(404);
    }


    $archivo = public_path($user->imagen);

    if (file_exists($archivo)) {
      
        unlink($archivo);
       
        $user->imagen = null;
        $user->save();
       
        return redirect()->back()->with('success', 'La imagen de perfil ha sido eliminada con éxito.');
    } else {
    
        return redirect()->back()->with('error', 'No se pudo encontrar la imagen de perfil para eliminar.');
    }
}
} 