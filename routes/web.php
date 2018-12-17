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
    return view('master');
});

/**
 * Rutas de Home
 */

Route::get('/home', 'HomeController@index');

/**
 * Rutas de Productos
 */

Route::get('/productos', 'ProductoController@lista');

Route::get('/productos/{id}', 'ProductoController@detalles')
    ->where('id', '[0-9]+');
    /*Expresion regular que nos indica que solo
     * puede recibir numeros y que puede tener mas de un numero
     */

Route::get('/productos/nuevo', 'ProductoController@nuevo');

Route::get('/productos/editar/{id}', 'ProductoController@editar');

/**
 * Rutas de Ingredientes
 */

Route::get('/ingredientes', 'IngredienteController@lista');

Route::get('/ingredientes/{id}', 'IngredienteController@detalles')
    ->where('id', '[0-9]+');/*Expresion regular que nos indica que solo
 * puede recibir numeros y que puede tener mas de un numero
 */


Route::get('/ingredientes/nuevo', 'IngredienteController@nuevo');

Route::get('/ingredientes/editar/{id}', 'IngredienteController@editar');

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

Route::get('/usuario', 'UsuarioController@ingresar');

Route::get('/usuario/registrar', 'UsuarioController@registrar');