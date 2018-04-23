<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarAtenderRequest extends FormRequest
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
            'sintomas'      => 'required',
            'examenes'      => 'required',
            'tratamiento'   => 'required',
            'observacion'   => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'sintomas.required'    => 'El campo síntoma es obligatorio.',
            'examenes.required'    => 'El campo exámenes es obligatorio.',
            'tratamiento.required' => 'El campo tratamiento es obligatorio.',
            'observacion.required' => 'El campo observación es obligatorio.',
        ];
    }
}
