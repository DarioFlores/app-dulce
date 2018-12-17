<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    function lista(){
        return "Listado de ingredientes";
    }

    function detalles($id){
        return "Detalles del ingredientes {$id}";
    }

    function nuevo(){
        return "Nuevo ingredientes";
    }

    function editar($id){
        return "Editar el ingredientes {$id}";
    }
}
