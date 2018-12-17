<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositoController extends Controller
{
    function index(){
        return "Mostrar todos los ingredientes en stock";
    }

    function agregar(){
        return "Agregar Compra";
    }

    function usado(){
        return "Restar del stock productos usados";
    }
}
