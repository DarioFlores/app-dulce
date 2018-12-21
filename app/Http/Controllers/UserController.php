<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function lista(){
        $users= User::all();
        $titulo = 'Listado de Usuarios';
        return view('user.lista', compact('titulo','users'));
    }

    function registrar(){
        return view('user.añadir');
    }

    function crear(){

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('user.lista');
    }
}
