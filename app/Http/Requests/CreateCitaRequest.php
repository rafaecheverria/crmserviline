<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCitaRequest extends FormRequest
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
            'fecha_inicio'  => 'required',
            'hora_inicio'   => 'required|before:hora_fin',
            'hora_fin'      => 'required',
            'paciente_id'   => 'required',
            'doctor_id'     => 'required',
            'speciality_id' => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'fecha_inicio.required' => 'Fecha inicio es obligatorio.',
            'hora_inicio.required' => 'Hora inicio es obligatorio.',
            'hora_inicio.before' => 'El campo hora inicio debe ser una hora anterior a hora fin.',
            'hora_fin.required' => 'Hora fin es obligatorio.',
            'paciente_id.required' => 'Paciente es obligatorio.',
            'doctor_id.required' => 'Doctor es obligatorio.',
            'speciality_id.required' => 'Especialidad es obligatorio.',
        ];
    }
}
