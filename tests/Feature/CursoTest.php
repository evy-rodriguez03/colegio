<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CursoTest extends TestCase
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
        $response = $this->get('/cursos');

        $response->assertStatus(200);
    }

    public function test_paraVerificarVistaCorrecta()
    {
        $response = $this->get('/cursos');

        $response->assertViewIs('curso.index');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('/cursos');
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }

    public function testNivelEducativoVacio()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => '',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('niveleducativo');
    }
     public function testNivelEducativoDatosCorrectos()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('niveleducativo');
    }

    public function testNivelEducativoNull()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => null,
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('niveleducativo');
    }

    public function testModalidadVacio()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => '',
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('modalidad');
    }
public function testModalidadCorrecto()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('modalidad');
    }

    public function testModalidadNull()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => null,
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('modalidad');
    }

    public function testJornadaVacio()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => '',
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('jornada');
    }   
    public function testJornadaDatosCorrectos()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('jornada');
    }   

    public function testJornadaNull()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => null,
            'seccion' => 'A',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('jornada');
    }

    public function testSeccionVacio()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => '',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('seccion');
    }
    public function testSeccionDatosCorrectos()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => 'B',
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('seccion');
    }

    public function testSeccionNull()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => null,
            'horario' => '07:00:00',
        ]);

        $response->assertSessionHasErrors('seccion');
    }

    public function testHorarioVacio()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => '',
        ]);

        $response->assertSessionHasErrors('horario');
    }   

    public function testHorarioNull()
    {
        $response = $this->post('/cursos', [
            'niveleducativo' => 'Primaria',
            'modalidad' => 'Presencial',
            'jornada' => 'Matutina',
            'seccion' => 'A',
            'horario' => null,
        ]);

        $response->assertSessionHasErrors('horario');
    }

}
