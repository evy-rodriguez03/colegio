<?php

namespace Tests\Feature;

use App\Models\Padre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PadreIndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $user = User::first();

        $this->actingAs($user);
    }

    public function test_paraVerificarRespuesta()
    {
        $response = $this->get('/padres');

        $response->assertStatus(200);
    }

    public function test_paraVerificarCargaDeAlumnos()
    {
        $response = $this->get('/padres');

        $response->assertViewHas('padres');
    }

    public function test_paraVerificarPaginacion()
    {
        Padre::factory()->count(20)->create();
        $response = $this->get('/padres');
        $this->assertCount(10, $response->viewData('padres'));
    }

    public function test_paraVerificarCambioPagina()
    {
        Padre::factory()->count(36)->create();

        $response = $this->get('/padres?page=4');
        $this->assertCount(6, $response->viewData('padres'));
    }


    public function test_paraVerificarVistaCorrecta()
    {
        $response = $this->get('/padres');

        $response->assertViewIs('secretaria.Padres.tabla_padre');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('/padres');
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }

    public function test_paraVerificarDatosDevueltos()
    {
        $padre = Padre::factory()->create(['primernombre' => 'Juan']);

        $response = $this->get('/padres');

        $response->assertStatus(200);
        $this->assertEquals('Juan', $response->viewData('padres')->first()->primernombre);
    }
}
