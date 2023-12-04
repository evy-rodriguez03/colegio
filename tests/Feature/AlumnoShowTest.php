<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnoShowTest extends TestCase
{
    use RefreshDatabase;
    protected $alumno;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $user = User::first();

        $this->actingAs($user);

        $this->alumno = Alumno::factory()->create();
    }

    public function test_paraVerificarRespuesta()
    {
        $response = $this->get('/alumnos/'.$this->alumno->id);

        $response->assertStatus(200);
    }

    public function test_paraVerificarCargaDeAlumnos()
    {
        $response = $this->get('/alumnos/'.$this->alumno->id);

        $response->assertViewHas('alumnos');
    }

    public function test_paraVerificarVistaCorrecta()
    {
        $response = $this->get('/alumnos/'.$this->alumno->id);

        $response->assertViewIs('secretaria.alumnos.show');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('/alumnos/'.$this->alumno->id);
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }
}
