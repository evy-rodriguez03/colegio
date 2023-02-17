<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = Usuario::all();
        return view('Administracion.Usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administracion.Usuarios.agregar_nuevo');
    }

    public function sendData(Request $request){
        $rules = [
            'nombre' => 'required|alpha|min:3',
            'correo' => 'required|email',
            'apellido'=> 'required|alpha|min:3',
            'contrasena'=> 'required|string|min:8',
        ];

        $messages = [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe llevar al menos más de 3 caracteres',
            'name.alpha' => 'El nombre no debe llevar números',
            'correo.required' => 'El campo de correo es obligatorio',
            'correo.email' => 'El correo debe ser un email valido',
            'apellido.required' => 'El apellido es obligatorio',
            'apellido.alpha'=> 'El apellido no debe llevar números',
            'apellido.min'=>'El apellido debe llevar al menos más de 3 caracteres',
            'contrasena.required'=>'El campo de contraseña es obligatorio',
            'contrasena.min'=>'El campo de contraseña al menos deberia llevar 8 caracteres',
        ];


        $this->validate($request, $rules, $messages);


        $usuarios = new Usuario();
        $usuarios->nombre = $request->input('nombre');
        $usuarios->apellido = $request->input('apellido');
        $usuarios->correo = $request->input('correo');
        $usuarios->contrasena = $request->input('contrasena');
        $usuarios->rol = $request->input('rol');
        $usuarios->save();
        $notification = 'El usuario se ha creado correctamente';

        return redirect('/usuarios')->with(compact('notification'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Usuario $usuarios)
    {
       
        return view('Administracion.Usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuarios )
    {
        $rules = [
            'nombre' => 'required|alpha|min:3',
            'correo' => 'required|email',
            'apellido'=> 'required|alpha|min:3',
            'contrasena'=> 'required|string|min:8',
        ];

        $messages = [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe llevar al menos más de 3 caracteres',
            'name.alpha' => 'El nombre no debe llevar números',
            'correo.required' => 'El campo de correo es obligatorio',
            'correo.email' => 'El correo debe ser un email valido',
            'apellido.required' => 'El apellido es obligatorio',
            'apellido.alpha'=> 'El apellido no debe llevar números',
            'apellido.min'=>'El apellido debe llevar al menos más de 3 caracteres',
            'contrasena.required'=>'El campo de contraseña es obligatorio',
            'contrasena.min'=>'El campo de contraseña al menos deberia llevar 8 caracteres',
        ];


        $this->validate($request, $rules, $messages);


        $usuarios->nombre = $request->input('nombre');
        $usuarios->apellido = $request->input('apellido');
        $usuarios->correo = $request->input('correo');
        $usuarios->contrasena = $request->input('contrasena');
        $usuarios->rol = $request->input('rol');
        $usuarios->save();
        $notification = 'El usuario se ha editado correctamente';

        return redirect('/usuarios')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuarios)
    {
        $usuarios->delete();
        $deletename = $usuarios->nombre;
        $notification = 'El usuario '.$deletename.' ha eliminado correctamente';
        return redirect('/usuarios')->with(compact('notification'));
    }
}
