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
    return view('welcome');
});

Route::get('/productos/{id}', function ($id){
    return "Detalles del Producto {$id}";
})->where('id', '[0-9]+'); //Expresion regular que nos indica que solo
// puede recibir numeros y que puede tener mas de un numero