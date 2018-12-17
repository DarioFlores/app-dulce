<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngredientesModuleTest extends TestCase
{
    /**
     * @test
     */
    public function carga_pag_lista()
    {
        $this->get('/ingredientes')
            ->assertStatus(200)
            ->assertSee('Listado de ingredientes');
    }

    /**
     * @test
     */
    public function carga_pag_detalles()
    {
        $this->get('/ingredientes/5')
            ->assertStatus(200)
            ->assertSee('Detalles del ingredientes 5');
    }

    /**
     * @test
     */
    public function carga_pag_nuevo()
    {
        $this->get('/ingredientes/nuevo')
            ->assertStatus(200)
            ->assertSee("Nuevo ingredientes");
    }

    /**
     * @test
     */
    public function carga_pag_editar()
    {
        $this->get('/ingredientes/editar/5')
            ->assertStatus(200)
            ->assertSee('Editar el ingredientes 5');
    }
}
