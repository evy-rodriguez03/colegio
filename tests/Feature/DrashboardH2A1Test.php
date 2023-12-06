<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DrashboardH2A1Test extends TestCase
{
    public function test_1_accesoALaRutaAlumnoDrashboardSinLogueo()
    {
        $response = $this->get(route('alumnos.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_2_accesoALaRutaAlumnoDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('alumnos.index'));

        $response->assertSuccessful();
    }
    public function test_3_accesoALaRutaPadresDrashboardSinLogueo()
    {
        $response = $this->get(route('padres.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_4_accesoALaRutaPadresDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('padres.index'));

        $response->assertSuccessful();
    }

    public function test_5_accesoALaRutaConsejeriaDrashboardSinLogueo()
    {
        $response = $this->get(route('tabla.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_6_accesoALaRutaConsejeriaDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('tabla.index'));

        $response->assertSuccessful();
    }

    public function test_7_accesoALaRutaPersonalDrashboardSinLogueo()
    {
        $response = $this->get(route('usuarios.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_8_accesoALaRutaPersonalDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('usuarios.index'));

        $response->assertSuccessful();
    }


    public function test_9_accesoALaRutaCerrarCesionDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->post(route('logout'));

        $response->assertStatus(302);
    }

    public function test_10_accesoALaRutaSecretariaMatriculaDrashboardSinLogueo()
    {
        $response = $this->get(route('principal.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_11_accesoALaRutaSecretariaMatriculaDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('principal.create'));

        $response->assertSuccessful();
    }

    public function test_12_accesoALaRutaSecretariaGradoSeccionDrashboardSinLogueo()
    {
        $response = $this->get(route('cursos.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_13_accesoALaRutaSecretariaGradoSeccionDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('cursos.index'));

        $response->assertSuccessful();
    }

    public function test_14_accesoALaRutaSecretariaCompromisoDrashboardSinLogueo()
    {
        $response = $this->get(route('indexcompromiso.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_15_accesoALaRutaSecretariaCompromisoDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('indexcompromiso.create'));

        $response->assertSuccessful();
    }

    public function test_16_accesoALaRutaSecretariaCursosTotalesDrashboardSinLogueo()
    {
        $response = $this->get(route('cursostotales.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_17_accesoALaRutaSecretariaCursosTotalesDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('cursostotales.index'));

        $response->assertSuccessful();
    }

    public function test_18_accesoALaRutaSecretariaIncioyCierreDeMatriculaDrashboardSinLogueo()
    {
        $response = $this->get(route('inicio.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_19_accesoALaRutaSecretariaIncioYCierreDeMatriculaDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('inicio.create'));

        $response->assertSuccessful();
    }

    public function test_20_accesoALaRutaOrientacionDrashboardSinLogueo()
    {
        $response = $this->get(route('escolar.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_21_accesoALaRutaOrientacionDrashboardConLogueo()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(route('escolar.index'));

        $response->assertSuccessful();
    }


}
