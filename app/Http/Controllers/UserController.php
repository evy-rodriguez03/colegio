<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
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

    public function sendData(Request $request)
    {

       $rules = [
        'name' => 'required|min:3|alpha',
                'email'=> 'required|email|unique:users,email|string',  
                'password' =>'required|string|min:8|max:15',
                'role'=> 'required'

       ];

       $messages= [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El nombre debe contener más de 3 caracteres',
        'name.alpha' => 'El nombre solo debe contener letras',
        'email.required' => 'El email es obligatorio',
        'email.email' => 'El correo debe ser un email valido',
        'email.unique' => 'Este correo ya se encuentra registrado',
        'password.required'=> 'La contraseña es un campo obligatorio',
        'password.min' => 'La contraseña al menos como minimo debe tener 6 caracteres',
        'password.max'=>'La contraseña debe tener un maximo de 15 caracteres'

       ];

       $this->validate($request,$rules,$messages);

        $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'role' => $request->input('role'),
    ]);

       
         $user->assignRole($request->input('role'));
         
       return redirect('/usuarios')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
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
    public function edit($id)
    {
        $usuarios = User::findOrFail($id);
        return view('Administracion.Usuarios.edit', compact('usuarios'));
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
        $rules = [
            'name' => 'required|min:3|alpha',
                    'email'=> 'required|email|string',  
                    'password' =>'required|string|min:8|max:15',
                    'role'=> 'required'
    
           ];
    
           $messages= [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe contener más de 3 caracteres',
            'name.alpha' => 'El nombre solo debe contener letras, tampoco espacios.',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El correo debe ser un email valido',
            'password.required'=> 'La contraseña es un campo obligatorio',
            'password.min' => 'La contraseña al menos como minimo debe tener 6 caracteres',
            'password.max'=>'La contraseña debe tener un maximo de 15 caracteres'
    
           ];
           $this->validate($request,$rules,$messages);

           $usuarios = User::findOrFail($id);
    
          $data = $request->only('name','email','password','role');
          $password = $request->input('password');

          
           

           if ($password) {
            $data['password'] = bcrypt($password);
           };

           $usuarios->fill($data);
           
           $usuarios->save();
             
             return redirect('/usuarios')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
    }
    public function habilitar($id)
    {
        $usuario = User::find($id);
        $usuario->activo = True;
        $usuario->save();
        return redirect()->back()->with('success', 'El usuario ha sido deshabilitado correctamente.');
    }
    

    public function deshabilitar($id)
{
    $usuario = User::find($id);
    $usuario->activo = false;
    $usuario->save();
    return redirect()->back()->with('success', 'El usuario ha sido deshabilitado correctamente.');
}


  
    public function destroy($id)
    {
        $usuarios = User::findOrfail($id);
        $usuarios->delete();

        
        return redirect('/usuarios')->with('eliminar', 'ok');
    }
}
