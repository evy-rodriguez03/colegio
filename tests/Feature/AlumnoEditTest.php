<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnoEditTest extends TestCase
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
        $response = $this->get('/alumnos/'.$this->alumno->id.'/edit');

        $response->assertStatus(200);
    }

    public function test_paraVerificarVistaCorrecta()
    {
        $response = $this->get('/alumnos/'.$this->alumno->id.'/edit');

        $response->assertViewIs('secretaria.alumnos.edit');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('/alumnos/'.$this->alumno->id.'/edit');
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }

    public function testPrimernombreVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primernombre'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testPrimernombreNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primernombre'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testPrimernombreCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primernombre'] = 'a';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testPrimernombreLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primernombre'] = str_repeat('a', 256);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testPrimernombreCaracteresNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primernombre'] = '12/*-*/';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testSegundonombreVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundonombre'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testSegundonombreNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundonombre'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testSegundonombreCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundonombre'] = 'a';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('segundonombre');
    }

    public function testSegundonombreLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundonombre'] = str_repeat('a', 256);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('segundonombre');
    }

    public function testSegundonombreCaracteresNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundonombre'] = '12/*-*/';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('segundonombre');
    }

    public function testPrimerapellidoVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primerapellido'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testPrimerapellidoNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primerapellido'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testPrimerapellidoCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primerapellido'] = 'a';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testPrimerapellidoLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primerapellido'] = str_repeat('a', 256);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testPrimerapellidoCaracteresNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['primerapellido'] = '12/*-*/';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testSegundoapellidoVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundoapellido'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testSegundoapellidoNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundoapellido'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testSegundoapellidoCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundoapellido'] = 'a';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('segundoapellido');
    }

    public function testSegundoapellidoLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundoapellido'] = str_repeat('a', 256);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('segundoapellido');
    }

    public function testSegundoapellidoCaracteresNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['segundoapellido'] = '12/*-*/';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('segundoapellido');
    }

    public function testNumeroIdentidadVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodeidentidad'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadNull()
    {
        $alumnoDnumerodeidentidadata = Alumno::factory()->make()->toArray();
        $alumnoData['numerodeidentidad'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodeidentidad'] = 'jksajksjk';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadCaracteres()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodeidentidad'] = '****!@%^';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodeidentidad'] = '1234567890';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodeidentidad'] = '12345678901234567890';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadDuplicado()
    {
        $identidad = '1111111111111';
        Alumno::factory()->create(['numerodeidentidad' => $identidad]);
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodeidentidad'] = $identidad;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testAlergiVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['alergia'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testAlergiNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['alergia'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testAlergiCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['alergia'] = 'a';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('alergia');
    }

    public function testAlergiLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['alergia'] = str_repeat('a', 256);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('alergia');
    }

    public function testAlergiCaracteresNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['alergia'] = '12/*-*/';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('alergia');
    }


    public function testTieneAlergiaVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['tiene_alergia'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('tiene_alergia');
    }

    public function testTieneAlergiaNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['tiene_alergia'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('tiene_alergia');
    }

    public function testTieneAlergiaLetra()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['tiene_alergia'] = 'a';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('tiene_alergia');
    }

    public function testTieneAlergiaLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['tiene_alergia'] = str_repeat('1', 256);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('tiene_alergia');
    }

    public function testTieneAlergiaMayorBooleano()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['tiene_alergia'] = 2;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('tiene_alergia');
    }

    public function testNoTieneAlergiaConAlergia()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['tiene_alergia'] = 0;
        $alumnoData['alergia'] = 'alergia Test';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors();
    }

    public function testTieneAlergiaSinAlergia()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['tiene_alergia'] = 1;
        $alumnoData['alergia'] = null;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors();
    }

    public function testGeneroVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['genero'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('genero');
    }

    public function testGeneroNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['genero'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('genero');
    }

    public function testGeneroLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['genero'] = str_repeat('a', 256);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('genero');
    }

    public function testGeneroNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['genero'] = '123456';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('genero');
    }

    public function testGeneroCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['genero'] = '-_#';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('genero');
    }

    public function testDireccionVacia()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['direccion'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('direccion');
    }

    public function testDireccionNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['direccion'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('direccion');
    }

    public function testDireccionLarga()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['direccion'] = str_repeat('a', 256);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('direccion');
    }

    public function testDireccionCorta()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['direccion'] = 'a';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('direccion');
    }

    public function testNumeroHermanosEnICGCNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodehermanosenicgc'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodehermanosenicgc');
    }

    public function testNumeroHermanosEnICGCVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodehermanosenicgc'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodehermanosenicgc');
    }

    public function testNumeroHermanosEnICGCLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodehermanosenicgc'] = 'abcdefgh';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodehermanosenicgc');
    }

    public function testNumeroHermanosEnICGCMayor8Caracteres()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodehermanosenicgc'] = '123456789';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodehermanosenicgc');
    }

    public function testNumeroHermanosEnICGCMenor8Caracteres()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodehermanosenicgc'] = '1234567';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodehermanosenicgc');
    }

    public function testNumeroHermanosEnICGCCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodehermanosenicgc'] = '$#-';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodehermanosenicgc');
    }

    public function testNumeroHermanosEnICGCDuplicado()
    {
        $numeroHermanos = '12345678';
        Alumno::factory()->create(['numerodehermanosenicgc' => $numeroHermanos]);
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['numerodehermanosenicgc'] = $numeroHermanos;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('numerodehermanosenicgc');
    }

    public function testFechaNacimientoVacia()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fechadenacimiento'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fechadenacimiento');
    }

    public function testFechaNacimientoNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fechadenacimiento'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fechadenacimiento');
    }

    public function testFechaNacimientoNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fechadenacimiento'] = '12345678';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fechadenacimiento');
    }

    public function testFechaNacimientoLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fechadenacimiento'] = 'abcdefg';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fechadenacimiento');
    }

    public function testFechaNacimientoCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fechadenacimiento'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fechadenacimiento');
    }

    public function testFechaNacimientoMuyVieja()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fechadenacimiento'] = '1800-01-01';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fechadenacimiento');
    }

    public function testFechaNacimientoMuyReciente()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fechadenacimiento'] = now()->subYears(17)->toDateString(); // asumiendo que la fecha actual menos 17 años es muy reciente

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fechadenacimiento');
    }

    public function testFotografiasNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografias'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('fotografias');
    }

    public function testFotografiasVacia()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografias'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('fotografias');
    }

    public function testFotografiasGrande()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografias'] = '12345678';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fotografias');
    }

    public function testFotografiasLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografias'] = 'abcdefgh';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fotografias');
    }

    public function testFotografiasCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografias'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fotografias');
    }

    public function testFotografiasDelPadreNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografiasdelpadre'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('fotografiasdelpadre');
    }

    public function testFotografiasDelPadreVacia()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografiasdelpadre'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('fotografiasdelpadre');
    }

    public function testFotografiasDelPadreMuchoNumero()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografiasdelpadre'] = '12345678';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fotografiasdelpadre');
    }

    public function testFotografiasDelPadreLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografiasdelpadre'] = 'abcdefgh';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fotografiasdelpadre');
    }

    public function testFotografiasDelPadreCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['fotografiasdelpadre'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('fotografiasdelpadre');
    }

    public function testCarnetNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['carnet'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('carnet');
    }

    public function testCarnetVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['carnet'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('carnet');
    }

    public function testCarnetNumeroGrande()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['carnet'] = '123456';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('carnet');
    }

    public function testCarnetLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['carnet'] = 'abcdef';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('carnet');
    }

    public function testCarnetCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['carnet'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('carnet');
    }

    public function testCertificadoDeConductaNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['certificadodeconducta'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('certificadodeconducta');
    }

    public function testCertificadoDeConductaVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['certificadodeconducta'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('certificadodeconducta');
    }

    public function testCertificadoDeConductaNumeroGrande()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['certificadodeconducta'] = '123456';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('certificadodeconducta');
    }

    public function testCertificadoDeConductaLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['certificadodeconducta'] = 'abcdef';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('certificadodeconducta');
    }

    public function testCertificadoDeConductaCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['certificadodeconducta'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('certificadodeconducta');
    }

    public function testCiudadVacia()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['ciudad'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('ciudad');
    }

    public function testCiudadNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['ciudad'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('ciudad');
    }

    public function testCiudadMuyCorta()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['ciudad'] = 'ab';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('ciudad');
    }

    public function testCiudadMuyLarga()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['ciudad'] = str_repeat('a', 17);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('ciudad');
    }

    public function testCiudadSoloNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['ciudad'] = '1234567890';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('ciudad');
    }

    public function testCiudadCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['ciudad'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('ciudad');
    }

    public function testDeptoVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['depto'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('depto');
    }

    public function testDeptoNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['depto'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('depto');
    }

    public function testDeptoMuyCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['depto'] = 'ab';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('depto');
    }

    public function testDeptoMuyLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['depto'] = str_repeat('a', 17);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('depto');
    }

    public function testDeptoSoloNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['depto'] = '1234567890';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('depto');
    }

    public function testDeptoCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['depto'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('depto');
    }

    public function testPaisVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['pais'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('pais');
    }

    public function testPaisNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['pais'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('pais');
    }

    public function testPaisMuyCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['pais'] = 'ab';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('pais');
    }

    public function testPaisMuyLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['pais'] = str_repeat('a', 17);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('pais');
    }

    public function testPaisSoloNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['pais'] = '1234567890';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('pais');
    }

    public function testPaisCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['pais'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('pais');
    }

    public function testGradoIngresarVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['gradoingresar'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('gradoingresar');
    }

    public function testGradoIngresarNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['gradoingresar'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('gradoingresar');
    }

    public function testGradoIngresarMuyCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['gradoingresar'] = 'ab';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('gradoingresar');
    }

    public function testGradoIngresarMuyLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['gradoingresar'] = str_repeat('a', 17);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('gradoingresar');
    }

    public function testGradoIngresarSoloNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['gradoingresar'] = '1234567890';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('gradoingresar');
    }

    public function testGradoIngresarCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['gradoingresar'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('gradoingresar');
    }

    public function testEscuelaAnteriorNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['escuelaanterior'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('escuelaanterior');
    }

    public function testEscuelaAnteriorVacia()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['escuelaanterior'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('escuelaanterior');
    }

    public function testEscuelaAnteriorNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['escuelaanterior'] = '1234567890';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('escuelaanterior');
    }

    public function testEscuelaAnteriorMuyLarga()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['escuelaanterior'] = str_repeat('a', 257);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('escuelaanterior');
    }

    public function testEscuelaAnteriorMuyCorta()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['escuelaanterior'] = 'ab';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('escuelaanterior');
    }

    public function testEscuelaAnteriorCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['escuelaanterior'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('escuelaanterior');
    }

    public function testTotalHermanosNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['totalhermanos'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('totalhermanos');
    }

    public function testTotalHermanosVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['totalhermanos'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('totalhermanos');
    }

    public function testTotalHermanosLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['totalhermanos'] = 'abcdef';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('totalhermanos');
    }

    public function testTotalHermanosNumeroGrande()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['totalhermanos'] = 100000; // Ajusta el valor según tu criterio para 'muy grande'

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('totalhermanos');
    }

    public function testTotalHermanosNegativo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['totalhermanos'] = -1;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('totalhermanos');
    }

    public function testTotalHermanosCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['totalhermanos'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('totalhermanos');
    }

    public function testMedicoNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['medico'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('medico');
    }

    public function testMedicoVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['medico'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('medico');
    }

    public function testMedicoMuyLargo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['medico'] = str_repeat('a', 13);

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('medico');
    }

    public function testMedicoMuyCorto()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['medico'] = 'ab';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('medico');
    }

    public function testMedicoNumeros()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['medico'] = '1234567890';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('medico');
    }

    public function testMedicoCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['medico'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('medico');
    }

    public function testTelefonoEmergenciaNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['telefonoemergencia'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('telefonoemergencia');
    }

    public function testTelefonoEmergenciaVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['telefonoemergencia'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('telefonoemergencia');
    }

    public function testTelefonoEmergenciaLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['telefonoemergencia'] = 'abcdef';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('telefonoemergencia');
    }

    public function testTelefonoEmergenciaMayor8Caracteres()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['telefonoemergencia'] = '123456789';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('telefonoemergencia');
    }

    public function testTelefonoEmergenciaMenor8Caracteres()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['telefonoemergencia'] = '1234567';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('telefonoemergencia');
    }

    public function testTelefonoEmergenciaCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['telefonoemergencia'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('telefonoemergencia');
    }

    public function testTelefonoEmergenciaDuplicado()
    {
        $telefonoExistente = '12345678';
        Alumno::factory()->create(['telefonoemergencia' => $telefonoExistente]);
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['telefonoemergencia'] = $telefonoExistente;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('telefonoemergencia');
    }

    public function testBusNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['bus'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('bus');
    }

    public function testBusVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['bus'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('bus');
    }

    public function testBusLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['bus'] = 'abc';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('bus');
    }

    public function testBusNumeroMuyGrande()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['bus'] = PHP_INT_MAX;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('bus');
    }

    public function testBusNegativo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['bus'] = -1;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('bus');
    }

    public function testBusCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['bus'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('bus');
    }

    public function testTaxiNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['taxi'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('taxi');
    }

    public function testTaxiVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['taxi'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('taxi');
    }

    public function testTaxiLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['taxi'] = 'abc';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('taxi');
    }

    public function testTaxiNumeroMuyGrande()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['taxi'] = PHP_INT_MAX;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('taxi');
    }

    public function testTaxiNegativo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['taxi'] = -1;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('taxi');
    }

    public function testTaxiCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['taxi'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('taxi');
    }

    public function testConpadreNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['conpadre'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('conpadre');
    }

    public function testConpadreVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['conpadre'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('conpadre');
    }

    public function testConpadreLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['conpadre'] = 'abc';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('conpadre');
    }

    public function testConpadreNumeroMuyGrande()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['conpadre'] = PHP_INT_MAX;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('conpadre');
    }

    public function testConpadreNegativo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['conpadre'] = -1;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('conpadre');
    }

    public function testConpadreCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['conpadre'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('conpadre');
    }

    public function testSoloNull()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['solo'] = NULL;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('solo');
    }

    public function testSoloVacio()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['solo'] = '';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionDoesntHaveErrors('solo');
    }

    public function testSoloLetras()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['solo'] = 'abc';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('solo');
    }

    public function testSoloNumeroMuyGrande()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['solo'] = PHP_INT_MAX;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('solo');
    }

    public function testSoloNegativo()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['solo'] = -1;

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('solo');
    }

    public function testSoloCaracteresEspeciales()
    {
        $alumnoData = Alumno::factory()->make()->toArray();
        $alumnoData['solo'] = '!@#$%^&*()';

        $response = $this->put('/alumnos/'.$this->alumno->id, $alumnoData);

        $response->assertSessionHasErrors('solo');
    }

}
