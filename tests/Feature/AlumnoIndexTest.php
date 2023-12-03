<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlumnoIndexTest extends TestCase
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
        $response = $this->get('/alumnos');

        $response->assertStatus(200);
    }

    public function test_paraVerificarCargaDeAlumnos()
    {
        $response = $this->get('/alumnos');

        $response->assertViewHas('alumnos');
    }

    public function test_paraVerificarRelacionConCursos()
    {
        $alumno =  Alumno::factory()->create();
        $curso = Curso::factory()->create();
        $alumno->cursos()->attach($curso);
        $response = $this->get('/alumnos');
        $this->assertTrue($response->viewData('alumnos')->first()->cursos->contains($curso));
    }

    public function test_paraVerificarPaginacion()
    {
        Alumno::factory()->count(20)->create();
        $response = $this->get('/alumnos');
        $this->assertCount(10, $response->viewData('alumnos'));
    }

    public function test_paraVerificarCambioPagina()
    {
        Alumno::factory()->count(36)->create();

        $response = $this->get('/alumnos?page=4');
        $this->assertCount(6, $response->viewData('alumnos'));
    }


    public function test_paraVerificarVistaCorrecta()
    {
        $response = $this->get('/alumnos');

        $response->assertViewIs('secretaria.Alumnos.index');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('/alumnos');
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }

    public function test_paraVerificarDatosDevueltos()
    {
        $alumno = Alumno::factory()->create(['primernombre' => 'Juan']);

        $response = $this->get('/alumnos');

        $response->assertStatus(200);
        $this->assertEquals('Juan', $response->viewData('alumnos')->first()->primernombre);
    }

}
