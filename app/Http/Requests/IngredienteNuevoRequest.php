<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredienteNuevoRequest extends FormRequest
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
            'nombre'    => 'required',
            'cantidad'  => ['required'],
            'unidad_id'    => ['required'],
            'detalles'   => [''],
            'cod_barra' => ['max:13'],
            'has_tacc'  => [''],
            'marca_id'     => ['required'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nombre'    => 'nombre del ingrediente',
            'cantidad'  => 'cantidad del ingrediente',
            'unidad_id'    => 'unidad del ingrediente',
            'detalles'   => 'detalles del ingrediente',
            'cod_barra' => 'codigo de barra del ingrediente',
            'has_tacc'  => 'TACC',
            'marca_id'     => 'nombre de la marca del ingrediente',
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
            'nombre.required'   => 'El campo :attribute es obligatorio.',
            'cantidad.required' => 'El campo :attribute es obligatorio.',
            'unidad_id.required'   => 'El campo :attribute es obligatorio.',
            'marca_id.required'    => 'El campo :attribute es obligatorio.',
            'cod_barra.max'    => 'El campo :attribute debe tener como maximo :max caracteres.',
        ];
    }
}
