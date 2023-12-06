<?php

namespace Tests\Feature;

use App\Models\Padre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PadreUpdateTest extends TestCase
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
        $response = $this->get('/padres/'.$this->padre->id.'/edit');

        $response->assertStatus(200);
    }

    public function test_paraVerificarVistaCorrecta()
    {
        $response = $this->get('/padres/'.$this->padre->id.'/edit');

        $response->assertViewIs('secretaria.Padres.editar_padre');
    }

    public function test_paraVerificarPerformance()
    {
        $startTime = microtime(true);
        $this->get('/padres/'.$this->padre->id.'/edit');
        $endTime = microtime(true);

        $this->assertLessThan(2, $endTime - $startTime); 
    }

    public function testPrimernombreVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primernombre'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testPrimernombreNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primernombre'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testPrimernombreCorto()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primernombre'] = 'a';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testPrimernombreLargo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primernombre'] = str_repeat('a', 256);

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testPrimernombreCaracteresNumeros()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primernombre'] = '12/*-*/';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primernombre');
    }

    public function testSegundonombreVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundonombre'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testSegundonombreNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundonombre'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testSegundonombreCorto()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundonombre'] = 'a';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('segundonombre');
    }

    public function testSegundonombreLargo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundonombre'] = str_repeat('a', 256);

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('segundonombre');
    }

    public function testSegundonombreCaracteresNumeros()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundonombre'] = '12/*-*/';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('segundonombre');
    }

    public function testPrimerapellidoVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primerapellido'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testPrimerapellidoNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primerapellido'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testPrimerapellidoCorto()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primerapellido'] = 'a';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testPrimerapellidoLargo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primerapellido'] = str_repeat('a', 256);

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testPrimerapellidoCaracteresNumeros()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['primerapellido'] = '12/*-*/';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('primerapellido');
    }

    public function testSegundoapellidoVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundoapellido'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testSegundoapellidoNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundoapellido'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testSegundoapellidoCorto()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundoapellido'] = 'a';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('segundoapellido');
    }

    public function testSegundoapellidoLargo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundoapellido'] = str_repeat('a', 256);

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('segundoapellido');
    }

    public function testSegundoapellidoCaracteresNumeros()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['segundoapellido'] = '12/*-*/';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('segundoapellido');
    }

    public function testNumeroIdentidadVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['numerodeidentidad'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadNull()
    {
        $padreDnumerodeidentidadata = Padre::factory()->make()->toArray();
        $padreData['numerodeidentidad'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadLetras()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['numerodeidentidad'] = 'jksajksjk';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadCaracteres()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['numerodeidentidad'] = '****!@%^';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadCorto()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['numerodeidentidad'] = '1234567890';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadLargo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['numerodeidentidad'] = '12345678901234567890';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testNumeroIdentidadDuplicado()
    {
        $identidad = '1111111111111';
        Padre::factory()->create(['numerodeidentidad' => $identidad]);
        $padreData = Padre::factory()->make()->toArray();
        $padreData['numerodeidentidad'] = $identidad;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('numerodeidentidad');
    }

    public function testTelefonoPersonalNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonopersonal'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonopersonal');
    }

    public function testTelefonoPersonalVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonopersonal'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonopersonal');
    }

    public function testTelefonoPersonalLetras()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonopersonal'] = 'abcdefgh';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonopersonal');
    }

    public function testTelefonoPersonalMayor8Caracteres()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonopersonal'] = '123456789';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonopersonal');
    }

    public function testTelefonoPersonalMenor8Caracteres()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonopersonal'] = '1234567';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonopersonal');
    }

    public function testTelefonoPersonalCaracteresEspeciales()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonopersonal'] = '$#-';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonopersonal');
    }

    public function testTelefonoPersonalDuplicado()
    {
        $numeroHermanos = '12345678';
        Padre::factory()->create(['telefonopersonal' => $numeroHermanos]);
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonopersonal'] = $numeroHermanos;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonopersonal');
    }

    public function testTelefonoOficinaNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonooficina'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonooficina');
    }

    public function testTelefonoOficinaVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonooficina'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonooficina');
    }

    public function testTelefonoOficinaLetras()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonooficina'] = 'abcdefgh';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonooficina');
    }

    public function testTelefonoOficinaMayor8Caracteres()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonooficina'] = '123456789';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonooficina');
    }

    public function testTelefonoOficinaMenor8Caracteres()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonooficina'] = '1234567';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonooficina');
    }

    public function testTelefonoOficinaCaracteresEspeciales()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonooficina'] = '$#-';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonooficina');
    }

    public function testTelefonoOficinaDuplicado()
    {
        $numeroHermanos = '12345678';
        Padre::factory()->create(['telefonooficina' => $numeroHermanos]);
        $padreData = Padre::factory()->make()->toArray();
        $padreData['telefonooficina'] = $numeroHermanos;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('telefonooficina');
    }

    public function testTipoVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['tipo'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testTipoNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['tipo'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testTipoCorto()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['tipo'] = 'a';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('tipo');
    }

    public function testTipoLargo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['tipo'] = str_repeat('a', 256);

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('tipo');
    }

    public function testTipoCaracteresNumeros()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['tipo'] = '12/*-*/';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('tipo');
    }

    public function testLugarDeTrabajoVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['lugardetrabajo'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testLugarDeTrabajoNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['lugardetrabajo'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testLugarDeTrabajoCorto()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['lugardetrabajo'] = 'a';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('lugardetrabajo');
    }

    public function testLugarDeTrabajoLargo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['lugardetrabajo'] = str_repeat('a', 256);

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('lugardetrabajo');
    }

    public function testLugarDeTrabajoCaracteresNumeros()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['lugardetrabajo'] = '12/*-*/';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('lugardetrabajo');
    }

    public function testOficioVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['oficio'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testOficioNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['oficio'] = NULL;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testOficioCorto()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['oficio'] = 'a';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('oficio');
    }

    public function testOficioLargo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['oficio'] = str_repeat('a', 256);

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('oficio');
    }

    public function testOficioCaracteresNumeros()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['oficio'] = '12/*-*/';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionHasErrors('oficio');
    }

    public function testIngresosVacio()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['ingresos'] = '';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testIngresosNull()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['ingresos'] = null;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testIngresosLetras()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['ingresos'] = 'fdfdfd';

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testIngresosNegativo()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['ingresos'] = -256;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testIngresosMuyGrande()
    {
        $padreData = Padre::factory()->make()->toArray();
        $padreData['ingresos'] = 99999999999999;

        $response = $this->put('/padres/'.$this->padre->id, $padreData);

        $response->assertSessionDoesntHaveErrors();
    }
}
