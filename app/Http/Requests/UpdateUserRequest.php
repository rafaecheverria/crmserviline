<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
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
            'genero'        => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombres.required' => 'El campo nombres es obligatorio.',
        ];
    }
}
