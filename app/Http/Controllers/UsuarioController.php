<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function ingresar(){
        return "Inicio de sesion";
    }

    function registrar(){
        return "Registrar a nuevos usuarios";
    }
}
