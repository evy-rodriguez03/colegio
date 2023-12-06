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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'image.required' => 'El campo de imagen es obligatorio.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif o svg.',
            'image.max' => 'La imagen no puede ser mayor a 2048 kilobytes (2MB).',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $user = User::findOrFail(Auth::user()->id);
        $user->imagen = 'images/'.$imageName;
        $user->save();


        return redirect()->route('profile')->with('success','Has subido correctamente la imagen.');
    }

    public function userProfile()
    {
        // Obtén la URL de la foto de perfil del usuario
        $user = User::findOrFail(Auth::user()->id);
        $fotoPerfilURL = $user->imagen; // Suponiendo que la URL de la foto de perfil se almacena en el atributo "imagen" del modelo User

        // Pasa la URL de la foto de perfil a la vista
        return view('pages.user-profile', ['fotoPerfilURL' => $fotoPerfilURL]);
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

    }


    if (!$user->imagen) {
        $errorMessage = 'Lo sentimos, la foto de perfil no fue encontrada.';
        return view('errors.custom', compact('errorMessage'))->withErrors(['errorMessage' => $errorMessage]);
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
