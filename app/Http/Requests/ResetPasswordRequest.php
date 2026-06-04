<?php

namespace App\Http\Requests;

class ResetPasswordRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed'
        ];
    }

    public function messages(): array 
    {
        return [
            'email.required' => 'O email é obrigatório!',
            'email.email' => 'Este email é inválido!',
            'password.required' => 'A senha é obrigatória!',
            'password.min' => 'A senha deve ter no mínimo 5 caracteres!',
            'password.confirmed' => 'As senhas não correspondem!'
        ];
    }
}
