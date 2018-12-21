<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    /**
     * @test
     */
    public function mostrar_formulario_añadir_user()
    {
        $this->get('/user/registrar')
            ->assertStatus(200)
            ->assertSee('Añadir nuevo Usuario');
    }

    /**
     * @test
     */
    public function crear_nuevo_usuario()
    {
        //ESPERAMOS QUE CUANDO MANDENOS ESTOS DATOS POR EL FORMULARIO NOS REDIRECCIONE A LA LISTA DE INGREDIENTES
        $this->post(route('user.crear'), [
            'name' => 'Dario',
            'email' => 'darioexequiel22@gmail.com',
            'password' => '123456',
        ])->assertRedirect(route('user.lista'));

        // ESPERAMOS ENCONTRAR EN LA BASE DE DATOS UN INGREDIENTE CON ESTOS ATRIBUTOS
        $this->assertCredentials([
            'name' => 'Dario',
            'email' => 'darioexequiel22@gmail.com',
            'password' => '123456'   //ESTE METODO AYUDA CUANDO TENEMOS ENCRIPTADO UN DATO
        ]);

        //PARA COMPROBAR SI UNA CONTRASEÑA ENCRITADA SE GUARDO CORRECTAMENTE SE USA
        //$this->assertCredentials([/*ARRAY ASOCIATIVO CON LOS DATOS*/]);
    }

    /**
     * @test
     */
    public function el_nombre_es_requerido()
    {
        $this->from(route('user.registrar'))
            ->post('/user/crear', [
                'name' => '',
                'email' => 'pablin@gmail.com',
                'password' => '123456'
            ])->assertRedirect(route('user.registrar'))
              ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        $this->assertDatabaseMissing('users', [
            'email' => 'pablin@gmail.com',
        ]);

    }
}
