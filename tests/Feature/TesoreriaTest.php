<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Models\Padre;
use App\Models\Pagorealizar;
use App\Models\User;
use Tests\TestCase;

class TesoreriaTest extends TestCase
{

    public function test_1_la_ruta_firmacontratotesoreria_deberia_retornar_respuesta_302_sin_usuario_logueado()
    {
        $response = $this->get('/firmacontratotesoreria');
        $response->assertStatus(302);
    }

    public function test_2_la_ruta_firmacontratotesoreria_deberia_retornar_al_login_sin_usuario_logueado()
    {
        $response = $this->get('/firmacontratotesoreria');
        $response->assertRedirect('/login');
    }

    public function test_3_la_ruta_firmacontratotesoreria_deberia_retornar_respuesta_200_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get('/firmacontratotesoreria');
        $response->assertStatus(200);
    }

    public function test_4_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get('/firmacontratotesoreria');
        $response->assertViewIs('tesoreria.firmacontratotesoreria');
    }

    public function test_5_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/firmacontratotesoreria');

        $response->assertSee('Firma de Contrato');
    }

    public function test_6_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_datos_de_padre_correctos_nombre()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $padre = Padre::firstOrCreate(
            [
                'numerodeidentidad' => '0805198800123',
            ],[

                'tipo' => 'Padre',
                'primernombre' => 'Carlos',
                'segundonombre' => 'Andrés',
                'primerapellido' => 'López',
                'segundoapellido' => 'González',
                'telefonopersonal' => '98765432',
                'lugardetrabajo' => 'Tegucigalpa',
                'oficio' => 'Ingeniero',
                'telefonooficina' => '99887766',
                'ingresos' => '120000',
        ]);

        $response = $this->get('/firmacontratotesoreria');

        $response->assertSee('Carlos López');
    }

    public function test_7_la_ruta_tesoreriavistapago_deberia_retornar_respuesta_302_sin_usuario_logueado()
    {
        $response = $this->get('/tesoreriavistapago');
        $response->assertStatus(302);
    }

    public function test_8_la_ruta_tesoreriavistapago_deberia_retornar_al_login_sin_usuario_logueado()
    {
        $response = $this->get('/tesoreriavistapago');
        $response->assertRedirect('/login');
    }

    public function test_9_la_ruta_tesoreriavistapago_deberia_retornar_respuesta_200_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get('/tesoreriavistapago');
        $response->assertStatus(200);
    }

    public function test_10_la_ruta_tesoreriavistapago_deberia_retornar_a_la_vista_tabla_index_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get('/tesoreriavistapago');
        $response->assertViewIs('tesoreria.vistapago');
    }

    public function test_11_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Pago a Realizar');
    }
  
     //cambio
     //muchas de las pruebas estan mal aplicadas por ejmplo esta 
     //tambien seria para la vista de vista pagos no firma contrato
     //   public function test_12_la_ruta_pagorealizar_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_1(){
       // $response = $this->actingAs(User::find(1))->get('/tesoreriavistapago');
       // $response->assertSee(' Nº'); }
       //tiene que ver mucho la logica del sistema
     public function test_12_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_1()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee(' Nº');
    }

    public function test_13_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_2()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Nombre');
    }

    public function test_14_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_3()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Identidad');
    }

    public function test_15_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_4()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Opciones');
    }
    
    //por la logica del sistema no puede devolver a esa vista 
    public function test_16_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_boton_pagos()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Pago');
    }

    public function test_17_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_boton_detalle_pagos()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Detalles de los pagos');
    }
     //el nombre esta mal planteado
    public function test_18_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_boton_regresar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Regresar');
    }


    public function test_19_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_texto_busqueda()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Buscar');
    }

    //por la logica del sistema no puede ser un error en la prueba 
    public function test_20_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_texto_nombre()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Juan');
    }

    public function test_21_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_texto_apellido()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('Pérez');
    }

    public function test_22_la_ruta_firmacontratotesoreria_deberia_retornar_a_la_vista_tabla_index_conteniendo_texto_identidad()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriavistapago');

        $response->assertSee('0703199600455');
    }


    public function test_23_la_ruta_tesoreriapago_deberia_retornar_respuesta_302_sin_usuario_logueado()
    {
        $response = $this->get('/tesoreriapago');
        $response->assertStatus(302);
    }

    public function test_24_la_ruta_tesoreriapago_deberia_retornar_al_login_sin_usuario_logueado()
    {
        $response = $this->get('/tesoreriapago');
        $response->assertRedirect('/login');
    }

    public function test_25_la_ruta_tesoreriapago_deberia_retornar_respuesta_200_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago?id_alumno='.$alumno->id);
        $response->assertStatus(200);
    }

    public function test_26_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago?id_alumno='.$alumno->id);
        $response->assertViewIs('tesoreria.pagorealizar');
    }

    public function test_27_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago',[
            'id_alumno' => $alumno->id
        ]);

        $response->assertSee('Pago a Realizar');
    }
      //po la logica del sistema no se podria ejecutar esta prueba ya que iene la vista detalles del pao o incluso deoleia al panel
      //de tesoreria no al index , esa divido ese sistema
    public function test_28_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes_mensualidad()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago',[
            'id_alumno' => $alumno->id
        ]);

        $response->assertSee('Mensualidad');
    }

    public function test_29_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes_gastos_administrativos()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago',[
            'id_alumno' => $alumno->id
        ]);

        $response->assertSee('Gastos administrativos');
    }

    public function test_30_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes_bolsa_escolar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago',[
            'id_alumno' => $alumno->id
        ]);

        $response->assertSee('Bolsa escolar');
    }

    public function test_31_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes_boton_guardar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago',[
            'id_alumno' => $alumno->id
        ]);

        $response->assertSee('Guardar');
    }

    public function test_32_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes_boton_regresar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago',[
            'id_alumno' => $alumno->id
        ]);

        $response->assertSee('Regresar');
    }

    public function test_33_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes_checkbox_mensualidad()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago?id_alumno='.$alumno->id);
        $secretariaCheckbox = $response->getContent();
        $this->assertStringContainsString('type="checkbox" name="mensualidad"',$secretariaCheckbox);
    }

    public function test_34_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes_checkbox_bolsaescolar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago?id_alumno='.$alumno->id);
        $secretariaCheckbox = $response->getContent();
        $this->assertStringContainsString('type="checkbox" name="bolsaescolar"',$secretariaCheckbox);
    }

    public function test_35_la_ruta_tesoreriapago_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes_checkbox_pagosadministrativos()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/tesoreriapago?id_alumno='.$alumno->id);
        $secretariaCheckbox = $response->getContent();
        $this->assertStringContainsString('type="checkbox" name="pagosadministrativos"',$secretariaCheckbox);
    }

    public function test_36_la_ruta_pagorealizar_deberia_actualizar_pagos_realizados_mensualidad_pagado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/pagorealizar/'.$alumno->id,[
            'mensualidad' => 1
        ]);

        $this->assertTrue(Pagorealizar::where('alumno_id',$alumno->id)->first()->mensualidad === 1);
    }


    public function test_37_la_ruta_pagorealizar_deberia_actualizar_pagos_realizados_mensualidad_no_pagado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/pagorealizar/'.$alumno->id,[
            'mensualidad' => 0
        ]);

        $this->assertTrue(Pagorealizar::where('alumno_id',$alumno->id)->first()->mensualidad === 0);
    }


    public function test_38_la_ruta_pagorealizar_deberia_actualizar_pagos_realizados_pagosadministrativos_pagado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/pagorealizar/'.$alumno->id,[
            'pagosadministrativos' => 1
        ]);

        $this->assertTrue(Pagorealizar::where('alumno_id',$alumno->id)->first()->pagosadministrativos === 1);
    }


    public function test_39_la_ruta_pagorealizar_deberia_actualizar_pagos_realizados_pagosadministrativos_no_pagado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/pagorealizar/'.$alumno->id,[
            'pagosadministrativos' => 0
        ]);

        $this->assertTrue(Pagorealizar::where('alumno_id',$alumno->id)->first()->pagosadministrativos === 0);
    }


    public function test_40_la_ruta_pagorealizar_deberia_actualizar_pagos_realizados_bolsaescolar_pagado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/pagorealizar/'.$alumno->id,[
            'bolsaescolar' => 1
        ]);

        $this->assertTrue(Pagorealizar::where('alumno_id',$alumno->id)->first()->bolsaescolar === 1);
    }


    public function test_41_la_ruta_pagorealizar_deberia_actualizar_pagos_realizados_bolsaescolar_no_pagado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/pagorealizar/'.$alumno->id,[
            'bolsaescolar' => 0
        ]);

        $this->assertTrue(Pagorealizar::where('alumno_id',$alumno->id)->first()->bolsaescolar === 0);
    }



    public function test_42_la_ruta_retrasadas_deberia_retornar_respuesta_302_sin_usuario_logueado()
    {
        $response = $this->get('/retrasadas');
        $response->assertStatus(302);
    }

    public function test_43_la_ruta_retrasadas_deberia_retornar_al_login_sin_usuario_logueado()
    {
        $response = $this->get('/retrasadas');
        $response->assertRedirect('/login');
    }

    public function test_44_la_ruta_retrasadas_deberia_retornar_respuesta_200_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get('/retrasadas');
        $response->assertStatus(200);
    }

    public function test_45_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get('/retrasadas');
        $response->assertViewIs('tesoreria.retrasada');
    }

    public function test_46_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_componetes()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/retrasadas');

        $response->assertSee('Clases Retrasadas');
    }

    public function test_47_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_1()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/retrasadas');

        $response->assertSee('N°');
    }

    public function test_48_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_2()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/retrasadas');

        $response->assertSee('Nombre');
    }

    public function test_49_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_3()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/retrasadas');

        $response->assertSee('Número de Identidad');
    }

    public function test_50_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_columna_4()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/retrasadas');

        $response->assertSee('Opciones');
    }


    public function test_51_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_boton_editar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/retrasadas');

        $response->assertSee('Editar');
    }


    public function test_52_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_boton_regresar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/retrasadas');

        $response->assertSee('Regresar');
    }


    public function test_53_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_texto_busqueda()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->get('/retrasadas');

        $response->assertSee('Buscar');
    }

    public function test_54_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_texto_nombre()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas');

        $response->assertSee('Juan');
    }

    public function test_55_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_texto_apellido()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas');

        $response->assertSee('Pérez');
    }

    public function test_56_la_ruta_retrasadas_deberia_retornar_a_la_vista_tabla_index_conteniendo_texto_identidad()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas');

        $response->assertSee('0703199600455');
    }


    public function test_57_la_ruta_retrasadas_create_deberia_retornar_respuesta_302_sin_usuario_logueado()
    {
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertStatus(302);
    }

    public function test_59_la_ruta_retrasadas_create_deberia_retornar_al_login_sin_usuario_logueado()
    {
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);
        $response->assertRedirect('/login');
    }

    public function test_60_la_ruta_retrasadas_create_deberia_retornar_respuesta_200_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);
        $response->assertStatus(200);
    }

    public function test_61_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_usuario_logueado()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);
        $response->assertViewIs('tesoreria.form_retrasadas');
    }

    public function test_62_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_conteniendo_componetes()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Agregar Clase Retrasadas');
    }

    public function test_63_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_tabla_index_conteniendo_label_input_1()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Datos del alumno:');
    }

    public function test_64_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_tabla_index_conteniendo_label_input_2()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Grado:');
    }

    public function test_65_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_tabla_index_conteniendo_label_input_3()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Materia Retrasada:');
    }

    public function test_66_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_tabla_index_conteniendo_label_input_4()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Año:');
    }

    public function test_67_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_tabla_index_conteniendo_label_input_5()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Total a Pagar:');
    }


    public function test_67_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_conteniendo_boton_aceptar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Aceptar');
    }


    public function test_68_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_conteniendo_boton_regresar()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Regresar');
    }

    public function test_69_la_ruta_retrasadas_create_deberia_retornar_a_la_vista_conteniendo_texto_nombre()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->get('/retrasadas/'.$alumno->id);

        $response->assertSee('Juan Antonio Pérez García');
    }

    public function test_70_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_input_grado()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' => $alumno->id,
            'grado' => 'Primer Grado',
            'anio' => null,
            'materiaretrasada' => null,
            'total' => null,
        ]);

        $response2 = $this->get('/retrasadas/'.$alumno->id);

        $response2->assertSee('Primer Grado');
    }

    public function test_71_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_input_materia_retrasada()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' => $alumno->id,
            'grado' => null,
            'anio' => null,
            'materiaretrasada' => 'Matematicas',
            'total' => null,
        ]);

        $response2 = $this->get('/retrasadas/'.$alumno->id);

        $response2->assertSee('Matematicas');
    }

    public function test_72_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_input_anio()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' => $alumno->id,
            'grado' => null,
            'anio' => '2022',
            'materiaretrasada' => null,
            'total' => null,
        ]);

        $response2 = $this->get('/retrasadas/'.$alumno->id);

        $response2->assertSee('2022');
    }

    public function test_73_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_input_total()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' => $alumno->id,
            'grado' => null,
            'anio' => null,
            'materiaretrasada' => null,
            'total' => 900.34,
        ]);

        $response2 = $this->get('/retrasadas/'.$alumno->id);

        $response2->assertSee('900.34');
    }

    public function test_74_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_id_alumno_requerido()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' => null,
            'grado' => null,
            'anio' => null,
            'materiaretrasada' => null,
            'total' => null,
        ]);

        $response->assertInvalid([
            'id_alumno' => 'El ID del alumno es obligatorio.'
        ]);
    }

    public function test_75_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_id_alumno_es_numero_entero()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' => 'id',
            'grado' => null,
            'anio' => null,
            'materiaretrasada' => null,
            'total' => null,
        ]);

        $response->assertInvalid([
            'id_alumno' => 'El ID del alumno debe ser un número entero.'
        ]);
    }


    public function test_76_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_grado_solo_texto()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' =>  $alumno->id,
            'grado' => 9,
            'anio' => null,
            'materiaretrasada' => null,
            'total' => null,
        ]);

        $response->assertInvalid([
            'grado' => 'El campo grado debe ser una cadena de texto.'
        ]);
    }


    public function test_77_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_grado_max_191()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' =>  $alumno->id,
            'grado' => 'kahsdjahsdjlkhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhajshdkjashdkjahs kdjhakjd hskjdh aksjvhdaksjhdkjashdck jash djahsk jdchak dcjhaskjdh caskjhcdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjash dckjash cdkjlah sdckj',
            'anio' => null,
            'materiaretrasada' => null,
            'total' => null,
        ]);

        $response->assertInvalid([
            'grado' => 'El campo grado no puede exceder los 191 caracteres.'
        ]);
    }

    public function test_78_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_grado_min_5()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' =>  $alumno->id,
            'grado' => 'a',
            'anio' => null,
            'materiaretrasada' => null,
            'total' => null,
        ]);

        $response->assertInvalid([
            'grado' => 'El campo grado no puede contener menos de 5 caracteres.'
        ]);
    }

    public function test_79_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_anio()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' =>  $alumno->id,
            'grado' => null,
            'anio' => 'a',
            'materiaretrasada' => null,
            'total' => null,
        ]);

        $response->assertInvalid([
            'anio' => 'El campo año debe ser un número entero.'
        ]);
    }

    public function test_80_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_materiaretrasada_solo_texto()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' =>  $alumno->id,
            'grado' => null,
            'anio' => null,
            'materiaretrasada' => 90,
            'total' => null,
        ]);

        $response->assertInvalid([
            'materiaretrasada' => 'El campo materia retrasada debe ser una cadena de texto.'
        ]);
    }

    public function test_81_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_materiaretrasada_grado_max_191()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' =>  $alumno->id,
            'grado' => null,
            'anio' => null,
            'materiaretrasada' => 'kahsdjahsdjlkhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhajshdkjashdkjahs kdjhakjd hskjdh aksjvhdaksjhdkjashdck jash djahsk jdchak dcjhaskjdh caskjhcdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjashdkaj schdkjash cdkjash dckjash cdkjlah sdckj',
            'total' => null,
        ]);

        $response->assertInvalid([
            'materiaretrasada' => 'El campo materia retrasada no puede exceder los 191 caracteres.'
        ]);
    }

    public function test_81_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_materiaretrasada_grado_min_5()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' =>  $alumno->id,
            'grado' => null,
            'anio' => null,
            'materiaretrasada' => 'j',
            'total' => null,
        ]);

        $response->assertInvalid([
            'materiaretrasada' => 'El campo materia retrasada no puede contener menos de 5 caracteres.'
        ]);
    }


    public function test_82_la_ruta_retrasadas_update_deberia_actualizar_los_campos_correctamente_validacion_materiaretrasada_total_ser_numerico()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $alumno = Alumno::firstOrCreate(
            [
                'numerodeidentidad' => '0703199600455',
            ],[
            'primernombre' => 'Juan',
            'segundonombre' => 'Antonio',
            'primerapellido' => 'Pérez',
            'segundoapellido' => 'García',
            'fechadenacimiento' => '1995-07-16',
            'genero' => 'masculino',
            'direccion' => 'Barrio La Esperanza',
            'numerodehermanosenicgc' => 1,
            'tiene_alergia' => 0,
            'alergia' => null,
            'fotografias' => 1,
            'fotografiasdelpadre' => 1,
            'carnet' => 1,
            'certificadodeconducta' => 1,
            'created_at' => '2023-11-15 12:28:58',
            'updated_at' => '2023-11-15 12:28:58',
            'ciudad' => 'San Pedro Sula',
            'depto' => 'Cortés',
            'pais' => 'Honduras',
            'escuelaanterior' => 'José Cecilio del Valle',
            'totalhermanos' => 1,
            'medico' => 'Dr. Martínez',
            'telefonoemergencia' => '98003699',
            'bus' => 1,
            'taxi' => 0,
            'conpadre' => 1,
            'solo' => 0,
        ]);
        $response = $this->post('/retrasadas',[
            'id_alumno' =>  $alumno->id,
            'grado' => null,
            'anio' => null,
            'materiaretrasada' => null,
            'total' => "total",
        ]);

        $response->assertInvalid([
            'total' => 'El campo total debe ser un número.'
        ]);
    }





}
