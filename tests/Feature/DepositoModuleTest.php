<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepositoModuleTest extends TestCase
{
    /**
     * @test
     */
    public function carga_pag_index()
    {
        $this->get('/deposito')
            ->assertStatus(200)
            ->assertSee('Mostrar todos los ingredientes en stock');
    }

    /**
     * @test
     */
    public function carga_pag_agregar()
    {
        $this->get('/deposito/agregar')
            ->assertStatus(200)
            ->assertSee('Agregar Compra');
    }

    /**
     * @test
     */
    public function carga_pag_usado()
    {
        $this->get('/deposito/usado')
            ->assertStatus(200)
            ->assertSee('Restar del stock productos usados');
    }
}
