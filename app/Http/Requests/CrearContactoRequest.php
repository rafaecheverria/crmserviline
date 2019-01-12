<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearContactoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombres_user'  => 'required|max:255',
            'apellidos_user'=> 'required|max:255',
            'telefono_user' => 'required|min:6|numeric',
            'cargo_id'      => 'required'
        ];
    }

     public function messages()
    {
        return [
            'nombres_user.string'     => 'El campo nombres es obligatorio.',
            'apellidos_user.required' => 'El campo apellidos es obligatorio.',
            'telefono_user.required'  => 'El campo teléfono es obligatorio.',
            'telefono_user.numeric'   => 'El campo teléfono debe contener sólo números.',
            'genero.required'         => 'El campo género es obligatorio.',
            'cargo_id.required'       => 'El campo cargo es obligatorio.',
        ];
    }
}
