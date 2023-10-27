<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginH1A1Test extends TestCase
{

    public function test_1_accesoALaRutaPrincipalSinLogueo()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));
    }

    public function test_2_accesoAOtraRutaDistintasSinLogueo()
    {
        $response = $this->get(route('usuarios.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_3_inicioDeSesionDatosCorrectos()
    {
        $response = $this->post(route('login',[
            'email' => 'admin@gmail.com',
            'password' => '12345678'
        ]));
        $response->assertRedirect('/');
    }

    public function test_4_inicioDeSesionDatosVacios()
    {
        $response = $this->post(route('login',[
            'email' => '',
            'password' => ''
        ]));
        $response->assertInvalid([
            'email' => 'El campo correo electrónico es obligatorio.',
            'password' => 'El campo contraseña es obligatorio.'
        ]);
    }

    public function test_5_inicioDeSesionDatosEmailVacio()
    {
        $response = $this->post(route('login',[
            'email' => '',
            'password' => '12345678'
        ]));
        $response->assertInvalid([
            'email' => 'El campo correo electrónico es obligatorio.',
        ]);
    }

    public function test_6_inicioDeSesionDatosPasswordVacio()
    {
        $response = $this->post(route('login',[
            'email' => 'admin@privado.com',
            'password' => ''
        ]));
        $response->assertInvalid([
            'password' => 'El campo contraseña es obligatorio.'
        ]);
    }

    public function test_7_inicioDeSesionDatosEmailIncorrecto()
    {
        $response = $this->post(route('login',[
            'email' => 'admin@privado.com',
            'password' => '12345678'
        ]));
        $response->assertInvalid([
            'email' => 'Estas credenciales no coinciden con nuestros registros.'
        ]);
    }

    public function test_8_inicioDeSesionDatosPasswordIncorrecto()
    {
        $response = $this->post(route('login',[
            'email' => 'admin@privado.com',
            'password' => '12212121212'
        ]));
        $response->assertInvalid([
            'email' => 'Estas credenciales no coinciden con nuestros registros.'
        ]);
    }

    public function test_9_inicioDeSesionDatosUsuarioSinRol()
    {
        User::where( 'email','manuel@example.com')->delete();
        User::create([
            'name' => 'Manuel Hernandez',
            'email' => 'manuel@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'usuario',
            'imagen' => 'nombre_de_la_imagen.png',
        ]);
        $response = $this->post(route('login',[
            'email' => 'manuel@example.com',
            'password' => '12345678'
        ]));
        $response->assertStatus(302);
    }

    public function test_10_inicioDeSesionDatosUsuarioRol()
    {
        User::where( 'email','manuel@example.com')->delete();
        $us = User::create([
            'name' => 'Manuel Hernandez',
            'email' => 'manuel@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'Secretaria',
            'imagen' => 'nombre_de_la_imagen.png',
        ]);
        $us->assignRole('Secretaria');
        $response = $this->post(route('login',[
            'email' => 'manuel@example.com',
            'password' => '12345678'
        ]));
        $response = $this->get('/');
        $response->assertViewIs('dashboard');
    }



}
