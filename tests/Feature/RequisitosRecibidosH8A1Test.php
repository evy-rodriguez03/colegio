<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RequisitosRecibidosH8A1Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_1_RequisitosRecibidosListadoSinLogueo()
    {
        $response = $this->get('/requisito');
        $response->assertStatus(302);
    }

    public function test_2_RequisitosRecibidosListadoLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/requisito');
        $response->assertStatus(200);
        $response->assertSee('Datos Recibidos');
    }
}
