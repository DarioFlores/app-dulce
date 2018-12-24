<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Entra a la primera URL que coincida

Route::get('/', function () {
    return view('productos.lista');
});

/**
 * Rutas de Home
 */

Route::get('/home', 'HomeController@index')
    ->name('home');


/**
 * Rutas de User
 */

Route::get('/user', 'UserController@lista')
    ->name('user.lista');

Route::get('/user/registrar', 'UserController@registrar')
    ->name('user.registrar');

Route::post('/user/crear', 'UserController@crear')
    ->name('user.crear');

Route::get('/user/{user}/editar', 'UserController@editar')
    ->name('user.editar');

Route::get('/user/{user}', 'UserController@detalles')
    ->name('user.detalles');

Route::put('/user/{user}', 'UserController@actualizar')
    ->name('user.actualizar');

Route::delete('/user/{user}','UserController@eliminar')
    ->name('user.eliminar');

/**
 * Rutas de Productos
 */

Route::get('/productos', 'ProductoController@lista')
    ->name('productos.lista');

Route::get('/productos/{id}', 'ProductoController@detalles')
    ->where('id', '[0-9]+')
    /*Expresion regular que nos indica que solo
     * puede recibir numeros y que puede tener mas de un numero
     */
    ->name('productos.detalles');

Route::get('/productos/nuevo', 'ProductoController@nuevo')
    ->name('productos.añadir');

Route::get('/productos/editar/{id}', 'ProductoController@editar')
    ->name('productos.modificar');

/**
 * Rutas de Ingredientes
 */

Route::get('/ingredientes', 'IngredienteController@lista')
    ->name('ingredientes.lista');

Route::post('/ingredientes/crear', 'IngredienteController@crear')
    ->name('ingredientes.crear');

Route::get('/ingredientes/{ing}', 'IngredienteController@detalles')
    ->name('ingredientes.detalles')
    ->where('ing', '[0-9]+');/*Expresion regular que nos indica que solo
 * puede recibir numeros y que puede tener mas de un numero
 */
Route::get('/ingredientes/nuevo', 'IngredienteController@nuevo')
    ->name('ingredientes.añadir');

Route::get('/ingredientes/editar/{ing}', 'IngredienteController@editar')
    ->name('ingredientes.modificar');

/**
 * Rutas de Deposito
 */

Route::get('/deposito', 'DepositoController@index');

Route::get('/deposito/agregar', 'DepositoController@agregar');

Route::get('/deposito/usado', 'DepositoController@usado');

/**
 * Rutas de Precio
 */

Route::get('/precio', 'PrecioController@index');

/**
 * Rutas de Usuarios
 */
