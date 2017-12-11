<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone'     => 'required|min:6|numeric',
            'email'     => 'required|email|max:255'
        ];
    }
}
