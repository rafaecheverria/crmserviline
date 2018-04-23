<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerfilRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nombres'       => 'required|max:255',
            'apellidos'     => 'required|max:255',
            'telefono'      => 'required|min:6|numeric',
            'email'         => 'required|email|max:255',
            'nacimiento'    => 'required',
            'direccion'     => 'required|max:50',
            'genero'        => 'required'
        ];
    }

     public function messages()
    {
        return [
            'nombres.string'     => 'El campo nombres es obligatorio.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'telefono.required'  => 'El campo teléfono es obligatorio.',
            'telefono.numeric'   => 'El campo nombre especialidad debe contener sólo números.',
            'email.required'     => 'El campo email es obligatorio.',
            'email.email'        => 'El campo email no tiene un formato correcto.',
            'nacimiento.required'=> 'El campo fecha de nacimiento es obligatorio.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'genero.required'    => 'El campo género es obligatorio.',
        ];
    }
}
