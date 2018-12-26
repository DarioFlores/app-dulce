<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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

    function crear(UserRequest $request){
        /**
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'], // SI NO TIENE NINGUNA RESTRICCION SE LE DEJA 'email' => ''
            'password' => ['required','min:6'],
        ], [
            'name.required' => 'El campo nombre es obligatorio',
        ]);
        **/

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        /**
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        **/

        $user->save();

        return redirect()->route('user.lista')->with('info', 'Se creo con exito el usuario.');
    }

    function detalles(User $user){
        return view('user.detalles',compact('user'));
    }

    function editar(User $user){
        return view('user.editar', ['user' => $user]);
    }

    function actualizar(Request $request,User $user){

        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users','email')->ignore($user->id)], // SI NO TIENE NINGUNA RESTRICCION SE LE DEJA 'email' => ''
            'password' => '',
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' =>'El campo e-mail es obligatorio.',
            'email.email' => 'Ingrese un e-mail valido.',
            'email.unique' => 'Este e-mail ya esta en uso.',
        ]);

        //$user->update($data);
        $user->name = $data['name'];
        $user->email = $data['email'];

        $user->save();

        return redirect(route('user.detalles',$user))->with('info', 'Se actualizo con exito el usuario '.$user->name.'.');
    }

    function eliminar(User $user)
    {
        $user->delete();
        return redirect(route('user.lista'))->with('info', 'Se elimino con exito el usuario '.$user->name.'.');
    }
}
