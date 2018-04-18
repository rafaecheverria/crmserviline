<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaEspecialidadRequest extends FormRequest
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
            'nombre'   => 'required|string',         
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre especialidad es obligatorio.',
            'nombre.string' => 'El campo nombre especialidad debe contener sólo letras.',
        ];
    }
}
