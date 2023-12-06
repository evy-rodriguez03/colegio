<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('pages.editar-profile');
    }

    public function show()
    {
        return view('pages.user-profile');
    }

    public function editprofile($id)
    {
        $usuarios = User::findOrFail($id);
        return view('pages.editar-profile', compact('usuarios'));
    }

    public function updateprofile(Request $request, $id)
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

           if($request->hasfile('image')){

            if($user->image != null){
                Storage::disk('images')->delete($user->image->path);
                $user->image->delete();
            }

            $user->image()->create([
                'path' => $request->image->store('users','images')
            ]);
           }
             
             return redirect('/profile')->with('success', '¡El dato ha sido guardado/actualizado correctamente!');
    }

}