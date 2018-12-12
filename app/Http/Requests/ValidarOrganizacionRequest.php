<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarOrganizacionRequest extends FormRequest
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
            //'rut'                => 'required|max:10|unique:organizaciones,rut',
            'nombre'             => 'required',
            'email'              => 'required|email|max:255|unique:organizaciones,email',
            'telefono'           => 'required|min:6|numeric',
            'direccion'          => 'required|max:50',
            'giro'               => 'required',
            'tipo'               => 'required',
        ];
    }

     public function messages()
    {
        return [
            //'rut.required'         => 'El campo rut es obligatorio.',
            //'rut.max:10'           => 'El campo rut debe tener un maxino de 10 digitos.',
            //'rut.unique'           => 'El campo rut ya existe en nuestros registros.',
            'nombres.string'       => 'El campo nombre es obligatorio.',
            'telefono.required'    => 'El campo teléfono es obligatorio.',
            'telefono.numeric'     => 'El campo teléfono debe contener sólo números.',
            'email.required'       => 'El campo email es obligatorio.',
            'email.unique'         => 'El campo email ya se encuentra en nuestros registros.',
            'email.email'          => 'El campo email no tiene un formato correcto.',
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
