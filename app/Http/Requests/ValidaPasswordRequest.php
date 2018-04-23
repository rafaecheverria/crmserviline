<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaPasswordRequest extends FormRequest
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
            'password'         => 'required|min:6',
            'passwordConfirm'  => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required'        => 'El campo password es obligatorio.',
            'password.min:6'             => 'El campo password debe tener un mínimo de 6 caracteres.',
            'passwordConfirm.required' => 'El campo confirmación es obligatorio.',
            'passwordConfirm.same'     => 'Las contraseñas no coiciden.',
        ];
    }
}
