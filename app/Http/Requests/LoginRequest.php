<?php

namespace App\Http\Requests;

class LoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'login_email' => 'required|email|max:100',
            'login_password' => 'required|min:5'
        ];
    }

    public function messages(): array
    {
        return [
            'login_email.required' => 'O email é obrigatório!',
            'login_email.max' => 'O email deve ter no máximo 100 caracteres!',
            'login_password.required' => 'A senha é obrigatória!',
            'login_password.min' => 'A senha deve ter no mínimo 5 caracteres!',
        ];
    }
}
