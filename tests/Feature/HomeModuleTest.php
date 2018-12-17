<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeModuleTest extends TestCase
{
    /**
     * @test
     */
    public function carga_pag_index()
    {
        $this->get('/home')
            ->assertStatus(200)
            ->assertSee('Resumen de todo lo importante');
    }
}
