<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CargoYPErsonalH3_4A1Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_1_accesoANuevoPersonalSinLogueo()
    {
        $response = $this->get('/usuarios/crear');

        $response->assertRedirect("/login");
    }

    public function test_2_accesoANuevoPersonalConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/usuarios/crear');

        $response->assertStatus(200)->assertViewIs('Administracion.Usuarios.agregar_nuevo');
    }

    public function test_3_accesoACrearNuevoPersonalSinLogueo()
    {
        $response = $this->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos@gmail.com',
            'password' =>'PedroFiallos@2023',
            'role'=> 'Orientacion'
        ]);

        $response->assertRedirect("/login");
    }

    public function test_4_accesoACrearNuevoPersonalConLogueo()
    {
        User::where('name','PedroFiallos')->delete();
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos@gmail.com',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $this->assertTrue(User::where('name','PedroFiallos')->count() == 1);
    }

    public function test_5_accesoACrearNuevoPersonalValidacionNombreRequerido()
    {

        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => '',
            'email'=> 'PedroFiallos@gmail.com',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'name' => 'El nombre es obligatorio',
        ]);
    }

    public function test_6_accesoACrearNuevoPersonalValidacionNombreMinimo3()
    {

        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'a',
            'email'=> 'PedroFiallos@gmail.com',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'name' => 'El nombre debe contener más de 3 caracteres',
        ]);
    }

    public function test_7_accesoACrearNuevoPersonalValidacionNombreAlpha()
    {

        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => '1234',
            'email'=> 'PedroFiallos@gmail.com',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'name' => 'El nombre solo debe contener letras',
        ]);
    }

    public function test_8_accesoACrearNuevoPersonalValidacionEmailVacio()
    {

        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> '',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'email' => 'El email es obligatorio',
        ]);
    }

    public function test_9_accesoACrearNuevoPersonalValidacionEmailFormatoCorrecto()
    {

        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'email' => 'El correo debe ser un email valido',
        ]);
    }

    public function test_10_accesoACrearNuevoPersonalValidacionEmailUnico()
    {

        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos@gmail.com',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'email' => 'Este correo ya se encuentra registrado',
        ]);
    }

    public function test_11_accesoACrearNuevoPersonalValidacionPasswordRequerido()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos2@gmail.com',
            'password' =>'',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'password' => 'La contraseña es un campo obligatorio',
        ]);
    }

    public function test_12_accesoACrearNuevoPersonalValidacionPasswordMin6()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos2@gmail.com',
            'password' =>'12',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'password' => 'La contraseña al menos como minimo debe tener 6 caracteres',
        ]);
    }

    public function test_13_accesoACrearNuevoPersonalValidacionPasswordMax15()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos2@gmail.com',
            'password' =>'12qwa312312easdasde3123123asdd',
            'password_confirmation' =>'Pedro@2023',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'password' => 'La contraseña debe tener un maximo de 15 caracteres',
        ]);
    }

//Ls confirmacion de contrasenia es necesaria
    public function test_14_accesoACrearNuevoPersonalValidacionPasswordComfirmacionContrasenia()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->post('/usuarios',[
            'name' => 'PedroFiallos',
            'email'=> 'PedroFiallos2@gmail.com',
            'password' =>'Pedro@2023',
            'password_confirmation' =>'12qwa312312easdasde312',
            'role'=> 'Orientacion'
        ]);


        $response->assertInvalid([
            'password' => 'La contraseña no coincide',
        ]);
    }



}
