<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrecioModuleTest extends TestCase
{
    /**
     * @test
     */
    public function carga_pag_index()
    {
        $this->get('/precio')
            ->assertStatus(200)
            ->assertSee('Agregar nuevos precios de los ingredientes');
    }
}
