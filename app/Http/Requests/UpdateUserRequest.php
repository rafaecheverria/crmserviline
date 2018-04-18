<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
