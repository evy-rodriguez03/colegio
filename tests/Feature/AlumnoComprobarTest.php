<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnoComprobarTest extends TestCase
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

    public function testComprobarAlumnoExistente()
    {
        $response = $this->post('/comprobar/matricula', ['identidad' => $this->alumno->numerodeidentidad]);
        $response->assertRedirect(route('creatematricula', ['id' => $this->alumno->id]));
        $response->assertSessionHas('success', '¡Matricula Existente!');
    }

    public function testComprobarAlumnoInexistente()
    {
        $response = $this->post('/comprobar/matricula', ['identidad' => '999999999']);
        $response->assertRedirect(route('creatematricula'));
        $response->assertSessionHas('success', '¡Alumno no matriculado!');
    }

    public function testValidacionDeDatos()
    {
        $response = $this->post('/comprobar/matricula', ['identidad' => '']);
        $response->assertSessionHasErrors('identidad');
    }
}
