<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    function lista(){

        $ingredientes= Ingrediente::all();
        $titulo = 'Listado de Ingredientes';

        return view('ingredientes.lista',compact('titulo','ingredientes'));
    }

    function detalles($id){
        $ing = Ingrediente::find($id);
        return view('detalles',compact('ing'));
    }

    function nuevo(){
        return "Nuevo ingredientes";
    }

    function editar($id){
        return "Editar el ingredientes {$id}";
    }
}
