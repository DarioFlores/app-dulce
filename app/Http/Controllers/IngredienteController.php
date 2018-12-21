<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use App\User;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    function lista(){

        $ingredientes= Ingrediente::all();
        $titulo = 'Listado de Ingredientes';

        return view('ingredientes.lista',compact('titulo','ingredientes'));
    }

    function detalles(Ingrediente $ing){
        return view('detalles',compact('ing'));
    }

    function nuevo(){
        return view('añadir');
    }

    function crear(){
        return "Procesando Informacion...";
    }

    function editar($id){
        return "Editar el ingredientes {$id}";
    }
}
