<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BusquePersonalH6Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_1_busquedapersonalSinLogueo()
    {
        $response = $this->get('/usuarios?buscar=Evelyn04');
        $response->assertStatus(302);
    }

    public function test_2_busquedapersonalConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/usuarios?buscar=Evelyn04');
        $response->assertStatus(200);
        $response->assertDontSee('Administrador');
    }
}
