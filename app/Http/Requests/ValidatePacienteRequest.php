<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePacienteRequest extends FormRequest
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
            'nombres_e'   => 'required',
            'apellidos_e' => 'required',
            'nacimiento_e'=> 'required',
            'email_e'     => 'required|email',
            'telefono_e'  => 'required',
            'direccion_e' => 'required',
            'genero_e'    => 'required'           
        ];
    }
    public function messages()
    {
        return [
            'nombres_e.required' => 'El campo nombres es obligatorio.',
            'apellidos_e.required' => 'El campo apellidos es obligatorio.',
            'nacimiento_e.required' => 'El campo fecha de nacimiento es obligatorio.',
            'email_e.required' => 'El campo email es obligatorio.',
            'email_e.email' => 'El campo email debe tener un formato válido.',
            'telefono_e.required' => 'El campo telefono es obligatorio.',
            'direccion_e.required' => 'El campo dirección es obligatorio.',
            'genero_e.required' => 'El campo género es obligatorio.',
        ];
    }
}
