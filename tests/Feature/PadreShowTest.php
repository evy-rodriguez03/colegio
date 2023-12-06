<?php

namespace Tests\Feature;

use App\Models\Padre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PadreShowTest extends TestCase
{
    use RefreshDatabase;
    protected $padre;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $user = User::first();

        $this->actingAs($user);

        $this->padre = Padre::factory()->create();
    }

    public function test_paraVerificarRespuesta()
    {
        $response = $this->get('/padres/'.$this->padre->id);

        $response->assertStatus(200);
    }

    public function test_paraVerificarCargaDepadres()
    {
        $response = $this->get('/padres/'.$this->padre->id);

        $response->assertViewHas('padre');
    }

    public function test_paraVerificarVistaCorrecta()
    {
        $response = $this->get('/padres/'.$this->padre->id);

        $response->assertViewIs('secretaria.Padres.padre_individual');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('/padres/'.$this->padre->id);
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }
}
