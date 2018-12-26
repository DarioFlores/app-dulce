<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'], // SI NO TIENE NINGUNA RESTRICCION SE LE DEJA 'email' => ''
            'password' => ['required','min:6'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' =>'El campo e-mail es obligatorio.',
            'email.email' => 'Ingrese un e-mail valido.',
            'email.unique' => 'Este e-mail ya esta en uso.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.between' => 'La contraseña tiene que tener como minimo :min caracteres.'
        ];
    }
}
