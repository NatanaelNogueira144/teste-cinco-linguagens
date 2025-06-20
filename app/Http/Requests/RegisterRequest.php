<?php

namespace App\Http\Requests;

class RegisterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5|confirmed'
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.max' => 'O nome deve ter no máximo 100 caracteres!',
            'email.required' => 'O email é obrigatório!',
            'email.email' => 'O email é inválido!',
            'email.unique' => 'O email informado já está em uso! Tente outro.',
            'password.required' => 'A senha é obrigatória!',
            'password.min' => 'A senha deve ter no mínimo 5 caracteres!',
            'password.confirmed' => 'As senhas não correspondem!',
        ];
    }
}
