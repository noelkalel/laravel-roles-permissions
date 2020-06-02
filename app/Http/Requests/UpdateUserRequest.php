<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name'     => 'required',
            // 'email'    => ['required', 'unique:users,email,' . request()->route('user')->id],
            // 'email' => 'required', 'unique:users,email', Rule::unique('users')->ignore($this->route()->user->id),
            'email' => 'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user),
            'password' => 'required',
            'roles'    => 'required|array'
        ];
    }
}
