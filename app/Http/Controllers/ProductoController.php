<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    function lista(){
        return "Listado de Productos";
    }

    function detalles($id){
        return "Detalles del Producto {$id}";
    }

    function nuevo(){
        return "Nuevo Producto";
    }

    function editar($id){
        return "Editar el Producto {$id}";
    }

}
