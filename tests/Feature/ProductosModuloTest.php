<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductosModuloTest extends TestCase
{
    /**
     * Verifica que se ejecute con EXITO la pagina
     * Verifica que lo que se muestra
     *
     * @test
     */
    public function carga_pag_lista_productos()
    {
        $this->get('/productos')
            ->assertStatus(200)
            ->assertSee('Listado de Productos');
    }

    /**
     * Verifica que se ejecute con EXITO la pagina
     * Verifica que lo que se muestra
     *
     * @test
     */
    public function carga_pag_detalles_producto()
    {
        $this->get('/productos/5')
            ->assertStatus(200)
            ->assertSee('Detalles del Producto 5');
    }
}
