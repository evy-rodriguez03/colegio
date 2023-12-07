<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatriculaTest extends TestCase
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
        $response = $this->get('iniciom');

        $response->assertStatus(200);
    }

    public function test_paraVerificarVistaCorrecta()
    {
        $response = $this->get('iniciom');

        $response->assertViewIs('Administracion.iniciom');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('iniciom');
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }

    public function testFechaInicioVacio()
    {
        $response = $this->post('/iniciom', [
            'fechaInicio' => '',
            'periodoMatricula' => '2021',
            'fechaCierre' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaInicio');
    }

    public function testFechaInicioNull()
    {
        $response = $this->post('/iniciom', [
            'fechaInicio' => NULL,
            'periodoMatricula' => '2021',
            'fechaCierre' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaInicio');
    }

    public function testFechaInicioVieja()
    {
        $response = $this->post('/iniciom', [
            'fechaInicio' => '1920-12-31',
            'periodoMatricula' => '2021',
            'fechaCierre' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaInicio');
    }
 
    //Nuestro sistema no debe de permitir fechas futuras solo la actual
    public function testFechaInicioFutura()
    {
        $response = $this->post('/iniciom', [
            'fechaInicio' => '2222-12-31',
            'periodoMatricula' => '2021',
            'fechaCierre' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaInicio');
    } 
    public function testFechaInicioLetras()
    {
        $response = $this->post('/iniciom', [
            'fechaInicio' => 'fddgsd',
            'periodoMatricula' => '2021',
            'fechaCierre' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaInicio');
    }

    public function testFechaCierreVacio()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => '',
            'periodoMatricula' => '2021',
            'fechaInicio' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaCierre');
    }

    public function testFechaCierreNull()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => NULL,
            'periodoMatricula' => '2021',
            'fechaInicio' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaCierre');
    }

    public function testFechaCierreVieja()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => '1920-12-31',
            'periodoMatricula' => '2021',
            'fechaInicio' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaCierre');
    }

    public function testFechaCierreFutura()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => '2222-12-31',
            'periodoMatricula' => '2021',
            'fechaInicio' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaCierre');
    }
    public function testFechaCierreLetras()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => 'fddgsd',
            'periodoMatricula' => '2021',
            'fechaInicio' => '2021-12-31',
        ]);

        $response->assertSessionHasErrors('fechaCierre');
    }

    public function testPeriodoMatriculaNull()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => '2021-12-31',
            'periodoMatricula' => NULL,
            'fechaInicio' => '2021-01-31',
        ]);

        $response->assertSessionHasErrors('periodoMatricula');
    }

    public function testPeriodoMatriculaVacio()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => '2021-12-31',
            'periodoMatricula' => '',
            'fechaInicio' => '2021-01-31',
        ]);

        $response->assertSessionHasErrors('periodoMatricula');
    }

    public function testPeriodoMatriculaLetras()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => '2021-12-31',
            'periodoMatricula' => 'dsfdffd',
            'fechaInicio' => '2021-01-31',
        ]);

        $response->assertSessionHasErrors('periodoMatricula');
    }

    public function testPeriodoMatriculaVieja()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => '2021-12-31',
            'periodoMatricula' => '1845',
            'fechaInicio' => '2021-01-31',
        ]);

        $response->assertSessionHasErrors('periodoMatricula');
    }

    public function testPeriodoMatriculaFutura()
    {
        $response = $this->post('/iniciom', [
            'fechaCierre' => '2021-12-31',
            'periodoMatricula' => '2845',
            'fechaInicio' => '2021-01-31',
        ]);

        $response->assertSessionHasErrors('periodoMatricula');
    }

}
