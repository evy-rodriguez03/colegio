<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompromisosH9A1Test extends TestCase
{
    public function test_1_CompromisosListadoSinLogueo()
    {
        $response = $this->get('/indexcompromiso');
        $response->assertStatus(302);
    }

    public function test_2_CompromisosRecibidosListadoLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/indexcompromiso');
        $response->assertStatus(200);
        $response->assertSee('Compromiso Conducta');
    }
}
