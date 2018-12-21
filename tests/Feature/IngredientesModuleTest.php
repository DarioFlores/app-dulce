<?php

namespace Tests\Feature;

use App\Ingrediente;
use App\Marca;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngredientesModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function carga_pag_ver_lista()
    {
        factory(Marca::class, 8)->create();

        factory(Ingrediente::class)->create([
            'nombre' => 'Leche'
        ]);

        factory(Ingrediente::class)->create([
            'nombre' => 'Harina'
        ]);

        $this->get('/ingredientes')
            ->assertStatus(200)
            ->assertSee('Listado de Ingredientes')
            ->assertSee('Leche')
            ->assertSee('Harina');
    }

    public function carga_pag_lista_vacia(){
        $this->get('/ingredientes')
            ->assertStatus(200)
            ->assertSee('No tenemos ingredientes aun');
    }

    /**
     * @test
     */
    public function carga_pag_ver_detalles_ingrediente()
    {
        factory(Marca::class, 8)->create();

        $ing = factory(Ingrediente::class)->create([
            'nombre' => 'Leche'
        ]);

        $this->get('/ingredientes/'.$ing->id)
            ->assertStatus(200)
            ->assertSee('Leche');
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

    /**
     * @test
     */
    public function erro_404_no_encontro_un_ingrediente()
    {
        $this->get('/ingredientes/9999')
            ->assertStatus(404)
            ->assertSee('PAGINA NO ENCONTRADA');
    }

    /**
     * @test
     */
    public function mostrar_formulario_añadir_ingrediente()
    {
        $this->get('/ingredientes/nuevo')
            ->assertStatus(200)
            ->assertSee('Añadir nuevo Ingrediente');
    }
}
