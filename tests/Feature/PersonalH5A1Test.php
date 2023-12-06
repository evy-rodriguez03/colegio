<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonalH5A1Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_1_accesoAEditarPersonalSinLogueo()
    {
        $response = $this->get('/usuarios/1/edit');

        $response->assertRedirect("/login");
    }

    public function test_2_accesoAEditarPersonalConLogueo()
    {
        $user = User::find(1);

        $usuarios = User::all()->first();
        $response = $this->actingAs($user)->get('/usuarios/'.$usuarios->id.'/edit');

        $usuarios = User::all();
        $response->assertStatus(200)->assertViewIs('Administracion.Usuarios.edit', ['usuarios'=>$usuarios]);
    }

    public function test_3_accesoAEditarPersonalSinLogueo()
    {
        $response = $this->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos@gmail.com',
            'password' =>'PedroFiallos@2023',
            'role'=> 'Orientacion'
        ]);

        $response->assertRedirect("/login");
    }

    public function test_4_accesoAEditarPersonalConLogueo()
    {
        $user = User::find(1);

        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => 'LisandroRomeun',
            'email'=> $usuario->email,
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);


        $this->assertTrue(User::where('name','LisandroRomeun')->count() == 1);
    }

    public function test_5_accesoAEditarPersonalValidacionNombreRequerido()
    {

        $user = User::find(1);

        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => '',
            'email'=> $usuario->email,
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);


        $response->assertInvalid([
            'name' => 'El nombre es obligatorio',
        ]);
    }

    public function test_6_accesoAEditarPersonalValidacionNombreMinimo3()
    {

        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => 'a',
            'email'=> $usuario->email,
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);


        $response->assertInvalid([
            'name' => 'El nombre debe contener más de 3 caracteres',
        ]);
    }

    public function test_7_accesoAEditarPersonalValidacionNombreAlpha()
    {

        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => '31231',
            'email'=> $usuario->email,
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);


        $response->assertInvalid([
            'name' => 'El nombre solo debe contener letras',
        ]);
    }

    public function test_8_accesoAEditarPersonalValidacionEmailVacio()
    {

        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => $usuario->name,
            'email'=> '',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);


        $response->assertInvalid([
            'email' => 'El email es obligatorio',
        ]);
    }

    public function test_9_accesoAEditarPersonalValidacionEmailFormatoCorrecto()
    {

        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => $usuario->name,
            'email'=> 'Pedro',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);

        $response->assertInvalid([
            'email' => 'El correo debe ser un email valido',
        ]);
    }

//el controlador no valida que el correo debe ser unico, debe mostrar mensaje al usuario
    public function test_10_accesoAEditarPersonalValidacionEmailUnico()
    {

        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => $usuario->name,
            'email'=> 'PedroFiallos@gmail.com',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);


        $response->assertInvalid([
            'email' => 'Este correo ya se encuentra registrado',
        ]);
    }

    public function test_11_accesoAEditarPersonalValidacionPasswordRequerido()
    {
        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => $usuario->name,
            'email'=>  $usuario->email,
            'password' =>'',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);


        $response->assertInvalid([
            'password' => 'La contraseña es un campo obligatorio',
        ]);
    }

    public function test_12_accesoAEditarPersonalValidacionPasswordMin6()
    {
        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => $usuario->name,
            'email'=>  $usuario->email,
            'password' =>'12',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);

        $response->assertInvalid([
            'password' => 'La contraseña al menos como minimo debe tener 6 caracteres',
        ]);
    }

    public function test_13_accesoAEditarPersonalValidacionPasswordMax15()
    {
        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => $usuario->name,
            'email'=>  $usuario->email,
            'password' =>'da4qqhgc21hjf2hg3f1gh2f3hg12f3hg1f2hg3f1hg23fgh12f3hg123',
            'password_confirmation' =>'Pedro@2023',
            'role'=> $usuario->role,
        ]);


        $response->assertInvalid([
            'password' => 'La contraseña debe tener un maximo de 15 caracteres',
        ]);
    }

//Ls confirmacion de contrasenia es necesaria
    public function test_14_accesoAEditarPersonalValidacionPasswordComfirmacionContrasenia()
    {
        $user = User::find(1);
        $usuario = User::latest()->first();

        $response = $this->actingAs($user)->put('/usuarios/'.$usuario->id,[
            'name' => $usuario->name,
            'email'=>  $usuario->email,
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023121212',
            'role'=> $usuario->role,
        ]);



        $response->assertInvalid([
            'password' => 'La contraseña no coincide',
        ]);
    }




}
