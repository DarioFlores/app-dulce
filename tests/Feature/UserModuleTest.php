<?php

namespace Tests\Feature;

use App\User;
use function foo\func;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function mostrar_formulario_añadir_user()
    {
        $this->get(route('user.registrar'))
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
            'email' => 'darioexequiel12@gmail.com',
            'password' => '123456',
        ])->assertRedirect(route('user.lista'));

        // ESPERAMOS ENCONTRAR EN LA BASE DE DATOS UN INGREDIENTE CON ESTOS ATRIBUTOS
        $this->assertCredentials([
            'name' => 'Dario',
            'email' => 'darioexequiel12@gmail.com',
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
            ->post(route('user.crear'), [
                'name' => '',
                'email' => 'pabl22in@gmail.com',
                'password' => '123456'
            ])->assertRedirect(route('user.registrar'))
              ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio.']);

        $this->assertDatabaseMissing('users', [
            'email' => 'pabl22in@gmail.com',
        ]);

    }

    /**
     * @test
     */
    public function el_email_es_requerido()
    {
        $this->from(route('user.registrar'))
            ->post(route('user.crear'), [
                'name' => 'Pablo',
                'email' => '',
                'password' => '123456'
            ])->assertRedirect(route('user.registrar'))
            ->assertSessionHasErrors(['email' => 'El campo e-mail es obligatorio.']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Pablo',
        ]);

    }

    /**
     * @test
     */
    public function el_email_no_es_valido()
    {
        $this->from(route('user.registrar'))
            ->post(route('user.crear'), [
                'name' => 'Pablo',
                'email' => 'email-no-valido',
                'password' => '123456'
            ])->assertRedirect(route('user.registrar'))
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Pablo',
        ]);

    }

    /**
     * @test
     */
    public function el_email_ya_existe()
    {

        factory(User::class)->create([
            'email' => 'pablin@gmail.com'
        ]);

        $n = User::count();

        $this->from(route('user.registrar'))
            ->post(route('user.crear'), [
                'name' => 'Pablo',
                'email' => 'pablin@gmail.com',
                'password' => '123456'
            ])->assertRedirect(route('user.registrar'))
            ->assertSessionHasErrors(['email']);

        $this->assertEquals($n,User::count());

    }

    /**
     * @test
     */
    public function el_contraseña_es_requerido()
    {
        $this->from(route('user.registrar'))
            ->post(route('user.crear'), [
                'name' => 'Pablo',
                'email' => 'pablin@gmail.com',
                'password' => ''
            ])->assertRedirect(route('user.registrar'))
            ->assertSessionHasErrors(['password']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Pablo',
        ]);
    }


    /**
     * @test
     */
    public function el_contraseña_requiere_tamaña_minimo_de_6_caracteres()
    {
        $this->from(route('user.registrar'))
            ->post(route('user.crear'), [
                'name' => 'Pablo',
                'email' => 'pablin@gmail.com',
                'password' => '122'
            ])->assertRedirect(route('user.registrar'))
            ->assertSessionHasErrors(['password']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Pablo',
        ]);
    }

    /**
     * @test
     */
    public function mostrar_formulario_editar_user()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->get(route('user.editar', $user))
            ->assertStatus(200)
            ->assertViewIs('user.editar')
            ->assertSee('Editar Usuario')
            ->assertViewHas('user', function ($viewUser) use ($user){
                return $viewUser->id === $user->id;
            });
    }

    /**
     * @test
     */
    public function actualizar_usuario()
    {
        $user = factory(User::class)->create();
        //ESPERAMOS QUE CUANDO MANDENOS ESTOS DATOS POR EL FORMULARIO NOS REDIRECCIONE A LA LISTA DE INGREDIENTES
        $this->from(route('user.editar', $user))
            ->put(route('user.actualizar',$user), [
            'name' => 'Gisella',
            'email' => 'gichu@gmail.com',
        ])->assertRedirect(route('user.lista'));

        // ESPERAMOS ENCONTRAR EN LA BASE DE DATOS UN INGREDIENTE CON ESTOS ATRIBUTOS
        $this->assertDatabaseHas('users',[
            'name' => 'Gisella',
            'email' => 'gichu@gmail.com',
        ]);
    }

    /**
     * @test
     */
    public function el_nombre_es_requerido_cuando_se_actualice_usuario()
    {
        $user = factory(User::class)->create();

        $this->from(route('user.editar', $user))
            ->put(route('user.actualizar',$user), [
                'name' => '',
                'email' => 'pabli2n@gmail.com',
            ])
            ->assertRedirect(route('user.editar',$user))
            ->assertSessionHasErrors(['name']);

        $this->assertDatabaseMissing('users', [
            'email' => 'pabli2n@gmail.com',
        ]);
    }







    /**
     * @test
     */
    public function el_email_es_requerido_cuando_se_actualice_usuario()
    {
        $user = factory(User::class)->create();

        $this->from(route('user.editar', $user))
            ->put(route('user.actualizar',$user), [
                'name' => 'Pablis',
                'email' => '',
            ])
            ->assertRedirect(route('user.editar',$user))
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Pablis',
        ]);

    }

    /**
     * @test
     */
    public function el_email_no_es_valido_cuando_se_actualice_usuario()
    {
        $user = factory(User::class)->create();

        $this->from(route('user.editar', $user))
            ->put(route('user.actualizar',$user), [
                'name' => 'Pablis',
                'email' => 'no-valido',
            ])
            ->assertRedirect(route('user.editar',$user))
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Pablis',
        ]);

    }

    /**
     * @test
     */
    public function el_email_ya_existe_cuando_se_actualiza()
    {

        factory(User::class)->create([
            'email' => 'email_existente@example.com'
        ]);

        $user = factory(User::class)->create([
            'email' => 'email_viejo@example.com'
        ]);

        $this->from(route('user.editar', $user))
            ->put(route('user.actualizar', $user), [
                'name' => 'Pablo',
                'email' => 'email_existente@example.com',
            ])->assertRedirect(route('user.editar', $user))
            ->assertSessionHasErrors(['email']);


    }

    /**
     * @test
     */
    public function el_email_cuando_es_el_mismo_es_opcional_cuando_se_actualice_usuario()
    {
        $user = factory(User::class)->create([
            'email' => 'pabli22n@gmail.com'
        ]);

        $this->from(route('user.editar', $user))
            ->put(route('user.actualizar',$user), [
                'name' => 'Pablis',
                'email' => 'pabli22n@gmail.com',
            ])
            ->assertRedirect(route('user.lista'));

        $this->assertDatabaseHas('users',[
            'name' => 'Pablis',
            'email' => 'pabli22n@gmail.com',
        ]);
    }

    /**
     * @test
     */
    public function la_eliminacion_de_usuario()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create([
            'email' => 'example@example.com'
        ]);

        $this->delete(route('user.eliminar', $user))
            ->assertRedirect(route('user.lista'));

        $this->assertDatabaseMissing('users',[
            'id' => $user->id,
            'email' => 'example@example.com'
        ]);
    }
}
