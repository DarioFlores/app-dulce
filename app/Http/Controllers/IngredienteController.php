<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredienteNuevoRequest;
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
        return view('ingredientes.nuevo');
    }

    function crear(IngredienteNuevoRequest $request){

        $ing = new Ingrediente();


        $ing->nombre = $request->input('nombre');
        $ing->cantidad = $request->input('cantidad');
        $ing->unidad_id = $request->input('unidad_id');
        $ing->detalles = $request->input('detalles');
        $ing->cod_barra = $request->input('cod_barra');
        $ing->has_tacc = $request->input('has_tacc');
        $ing->marca_id = $request->input('marca_id');


        $ing->save();

        return redirect()
                ->route('ingredientes.lista')
                ->with('info', 'Se creo con exito el nuevo ingrediente.');
    }

    function editar($id){
        return "Editar el ingredientes {$id}";
    }
}
