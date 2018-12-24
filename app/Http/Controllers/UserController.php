<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'email' => ['required', 'email', 'unique:users,email'], // SI NO TIENE NINGUNA RESTRICCION SE LE DEJA 'email' => ''
            'password' => ['required','min:6'],
        ], [
            'name.required' => 'El campo nombre es obligatorio',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('user.lista');
    }

    function detalles(User $user){
        return view('user.detalles',compact('user'));
    }

    function editar(User $user){
        return view('user.editar', ['user' => $user]);
    }

    function actualizar(User $user){

        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users','email')->ignore($user->id)], // SI NO TIENE NINGUNA RESTRICCION SE LE DEJA 'email' => ''
            'password' => '',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
        ]);

        if ($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        } else{
            unset($data['password']);
        }

        $user->update($data);

        return redirect(route('user.detalles',$user));
    }

    function eliminar(User $user)
    {
        $user->delete();
        return redirect(route('user.lista'));
    }
}
