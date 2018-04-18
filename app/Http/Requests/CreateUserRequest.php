<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'rut_add'           => 'required|max:10|unique:users,rut',
            'nombres_add'       => 'required|max:255',
            'apellidos_add'     => 'required|max:255',
            'telefono_add'      => 'required|min:6|numeric',
            'email_add'         => 'required|email|max:255',
            'nacimiento_add'    => 'required',
            'direccion_add'     => 'required|max:50',
            'genero_add'        => 'required'
        ];
    }

     public function messages()
    {
        return [
            'rut_add.required'       => 'El campo rut es obligatorio.',
            'rut_add.max:10'         => 'El campo rut debe tener un maxino de 10 digitos.',
            'rut_add.unique'         => 'El campo rut ya existe en nuestros registros.',
            'nombres_add.string'     => 'El campo nombres es obligatorio.',
            'apellidos_add.required' => 'El campo apellidos es obligatorio.',
            'telefono_add.required'  => 'El campo teléfono es obligatorio.',
            'telefono_add.numeric'   => 'El campo teléfono debe contener sólo números.',
            'email_add.required'     => 'El campo email es obligatorio.',
            'email_add.email'        => 'El campo email no tiene un formato correcto.',
            'nacimiento_add.required'=> 'El campo fecha de nacimiento es obligatorio.',
            'direccion_add.required' => 'El campo dirección es obligatorio.',
            'genero_add.required'    => 'El campo género es obligatorio.',
        ];
    }
}
