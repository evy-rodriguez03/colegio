<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnoPDFTest extends TestCase
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
        $response = $this->get('/alumnos/pdf');

        $response->assertStatus(200);
    }

    public function test_paraVerificarRetornaPDF()
    {
        $response = $this->get('/alumnos/pdf');

        $response->assertHeader('Content-Type', 'application/pdf');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('/alumnos/pdf');
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }
}
