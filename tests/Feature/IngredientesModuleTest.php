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
    public function mostrar_formulario_nuevo_ingrediente()
    {
        $this->get(route('ingredientes.nuevo'))
            ->assertStatus(200)
            ->assertSee('Datos de Ingrediente');
    }

    /**
     * @test
     */
    public function añadir_nuevo_ingrediente()
    {
        $this->withoutExceptionHandling();
        factory(Marca::class, 8)->create();
        $marca = Marca::first();
        //ESPERAMOS QUE CUANDO MANDENOS ESTOS DATOS POR EL FORMULARIO NOS REDIRECCIONE A LA LISTA DE INGREDIENTES
        $this->post('/ingredientes/crear', [
            'nombre' => 'Leche',
            'marca_id' => $marca->id,
        ])->assertRedirect(route('ingredientes.lista'));

        // ESPERAMOS ENCONTRAR EN LA BASE DE DATOS UN INGREDIENTE CON ESTOS ATRIBUTOS
        $this->assertDatabaseHas('ingredientes',[
            'nombre' => 'Leche',
            'marca_id' => $marca->id,
        ]);

        //PARA COMPROBAR SI UNA CONTRASEÑA ENCRITADA SE GUARDO CORRECTAMENTE SE USA
        //$this->assertCredentials([/*ARRAY ASOCIATIVO CON LOS DATOS*/]);

    }
}
