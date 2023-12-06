<?php

namespace Tests\Feature;

use App\Models\Padre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PadreDestroyTest extends TestCase
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
    
    public function testEliminarPadre()
    {
        $response = $this->delete("/padres/{$this->padre->id}");

        $this->assertDeleted($this->padre);

        $response->assertRedirect('/padres');
        $this->assertTrue(session()->has('eliminar'));
        $this->assertEquals('ok', session('eliminar'));
    }

    public function testEliminarpadreNoExistente()
    {
        $response = $this->delete("/padres/999");

        $this->assertTrue(session()->has('eliminar'));
        $this->assertEquals('ok', session('eliminar'));
    }
}
