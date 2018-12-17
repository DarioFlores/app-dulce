<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuarioModuleTest extends TestCase
{
    /**
     * @test
     */
    public function carga_pag_ingresar()
    {
        $this->get('/usuario')
            ->assertStatus(200)
            ->assertSee('Inicio de sesion');
    }

    /**
     * @test
     */
    public function carga_pag_registrar()
    {
        $this->get('/usuario/registrar')
            ->assertStatus(200)
            ->assertSee('Registrar a nuevos usuarios');
    }
}
