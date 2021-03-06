<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertarVendedorRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rut_user'           => 'required|max:12|unique:users,rut',
            'nombres_user'       => 'required|max:255',
            'apellidos_user'     => 'required|max:255',
            'telefono_user'      => 'required|min:6|numeric',
            'email_user'         => 'required|email|max:255',
            'direccion_user'     => 'required|max:50',
            'genero'             => 'required'

        ];
    }

    public function messages()
    {
        return [
            'rut_user.required'       => 'El campo rut es obligatorio.',
            'rut_user.max:12'         => 'El campo rut debe tener un maxino de 12 digitos.',
            'rut_user.unique'         => 'El campo rut ya existe en nuestros registros.',
            'nombres_user.string'     => 'El campo nombres es obligatorio.',
            'apellidos_user.required' => 'El campo apellidos es obligatorio.',
            'telefono_user.required'  => 'El campo teléfono es obligatorio.',
            'telefono_user.numeric'   => 'El campo teléfono debe contener sólo números.',
            'email_user.required'     => 'El campo email es obligatorio.',
            'email_user.email'        => 'El campo email no tiene un formato correcto.',
            'direccion_user.required' => 'El campo dirección es obligatorio.',
        ];
    }
}
