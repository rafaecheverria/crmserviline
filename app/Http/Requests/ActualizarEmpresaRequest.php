<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarEmpresaRequest extends FormRequest
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
            'region_id'          => 'required',
            'ciudad_id'          => 'required',
            'vendedor_id'        => 'required',
            'contacto_id'        => 'required',
            'nombre'             => 'required',
            'telefono'           => 'required|min:6|numeric',
            'direccion'          => 'required|max:50',
            'giro'               => 'required',
            'tipo'               => 'required',
        ];
    }

     public function messages()
    {
        return [
            'nombres.string'       => 'El campo nombre es obligatorio.',
            'telefono.required'    => 'El campo teléfono es obligatorio.',
            'telefono.numeric'     => 'El campo teléfono debe contener sólo números.',
            'direccion.required'   => 'El campo dirección es obligatorio.',
            'giro.required'        => 'El campo giro es obligatorio.',
            'region_id.required'   => 'El campo region es obligatorio.',
            'ciudad_id.required'   => 'El campo ciudad es obligatorio.',
            'vendedor_id.required' => 'El campo vendedor es obligatorio.',
            'contacto_id.required' => 'El campo contacto es obligatorio.',
            'tipo.required'        => 'El campo tipo es obligatorio.',
        ];
    }
}
