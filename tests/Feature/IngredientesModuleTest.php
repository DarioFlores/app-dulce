<?php

namespace Tests\Feature;

use App\Ingrediente;
use App\Marca;
use App\Unidad;
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
    public function mostrar_formulario_nuevo_ingrediente()
    {
        $this->get(route('ingredientes.nuevo'))
            ->assertStatus(200)
            ->assertViewIs('ingredientes.nuevo')
            ->assertSee('Datos de Ingrediente');
    }

    /**
     * @test
     */
    public function crear_nuevo_ingrediente()
    {
        $this->withoutExceptionHandling();
        $unidad = factory(Unidad::class)->create();
        $marca = factory(Marca::class)->create();

        $this->from(route('ingredientes.nuevo'))
            ->post(route('ingredientes.crear'), [
            'nombre'    => 'Leche',
            'cantidad'  => '1',
            'unidad_id'    => $unidad->id,
            'detalles'   => 'Leche entera preferiblemente en caja para poder almacenarla.',
            'cod_barra' => '7794710010017',
            'has_tacc'  => '1',
            'marca_id'     => $marca->id,
        ])->assertRedirect(route('ingredientes.lista'));

        $this->assertDatabaseHas('ingredientes', [
            'nombre'    => 'Leche',
            'cantidad'  => '1',
            'unidad_id'    => $unidad->id,
            'detalles'   => 'Leche entera preferiblemente en caja para poder almacenarla.',
            'cod_barra' => '7794710010017',
            'has_tacc'  => '1',
            'marca_id'     => $marca->id,
        ]);
    }

    /**
     * @test
     */
    public function crear_nuevo_ingrediente_campos_requeridos()
    {
        $this->withoutExceptionHandling();
        $unidad = factory(Unidad::class)->create();
        $marca = factory(Marca::class)->create();

        $this->from(route('ingredientes.nuevo'))
            ->post(route('ingredientes.crear'), [
                'nombre'    => 'Leche',
                'cantidad'  => '1',
                'unidad_id' => $unidad->id,
                'marca_id'  => $marca->id,
                'has_tacc'  => '0'
            ])->assertRedirect(route('ingredientes.lista'));

        $this->assertDatabaseHas('ingredientes', [
            'nombre'    => 'Leche',
            'cantidad'  => '1',
            'unidad_id'    => $unidad->id,
            'marca_id'     => $marca->id,
        ]);
    }
}
