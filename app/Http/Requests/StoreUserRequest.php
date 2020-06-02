<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required',
            'roles'    => 'required|array'
        ];
    }
}
