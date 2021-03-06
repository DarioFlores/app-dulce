<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductosModuloTest extends TestCase
{
    /**
     * @test
     */
    public function carga_pag_lista()
    {
        $this->get('/productos')
            ->assertStatus(200)
            ->assertSee('Listado de Productos');
    }

    /**
     * @test
     */
    public function carga_pag_detalles()
    {
        $this->get('/productos/5')
            ->assertStatus(200)
            ->assertSee('Detalles del Producto 5');
    }

    /**
     * @test
     */
    public function carga_pag_nuevo()
    {
        $this->get('/productos/nuevo')
            ->assertStatus(200)
            ->assertSee("Nuevo Producto");
    }

    /**
     * @test
     */
    public function carga_pag_editar()
    {
        $this->get('/productos/editar/5')
            ->assertStatus(200)
            ->assertSee('Editar el Producto 5');
    }
}
