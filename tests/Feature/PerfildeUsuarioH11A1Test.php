<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PerfildeUsuarioH11A1Test extends TestCase
{
    public function test_1_PerfildeUsuarioLogueo()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    public function test_2_PerfildeUsuarioEnlacePerfilLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
        $response->assertSee('Mi Perfil');
    }

    public function test_3_PerfildeUsuarioEnlaceCerrarSesionLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
        $response->assertSee('Cerrar sesión');
    }

    public function test_4_PerfildeUsuarioEnlacePerfilEditarLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/profile');
        $response->assertStatus(200);
        $response->assertSee('Perfil Usuario');
    }

    public function test_3_PerfildeUsuarioEnlaceCerrarSesionCerrarSesion()
    {
        $user = User::find(1);
        Auth::login($user);
        $response = $this->post('/logout');
        $response->assertRedirect('/');
    }


}
