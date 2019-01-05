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
            'nombre'    => ['require'],
            'cantidad'  => ['require'],
            'unidad'    => ['require'],
            'detalle'   => [''],
            'cod_barra' => [''],
            'has_tacc'  => [''],
            'marca'     => ['required'],
            'calidad'   => [''],
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
            'unidad'    => 'unidad del ingrediente',
            'detalle'   => 'detalles del ingrediente',
            'cod_barra' => 'codigo de barra del ingrediente',
            'has_tacc'  => 'TACC',
            'marca'     => 'nombre de la marca del ingrediente',
            'calidad'   => 'calidad de la marca del ingrediente',
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
            'unidad.required'   => 'El campo :attribute es obligatorio.',
            'marca.required'    => 'El campo :attribute es obligatorio.',
        ];
    }
}
