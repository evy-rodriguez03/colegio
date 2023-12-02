<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnoDestroyTest extends TestCase
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

    public function testEliminarAlumno()
    {
        $response = $this->delete("/alumnos/{$this->alumno->id}");

        $this->assertDeleted($this->alumno);

        $response->assertRedirect('/alumnos');
        $this->assertTrue(session()->has('eliminar'));
        $this->assertEquals('ok', session('eliminar'));
    }

    public function testEliminarAlumnoNoExistente()
    {
        $response = $this->delete("/alumnos/999");

        $response->assertRedirect('/alumnos');
        $this->assertTrue(session()->has('eliminar'));
        $this->assertEquals('ok', session('eliminar'));
    }
}

