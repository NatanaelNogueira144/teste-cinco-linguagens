<?php

namespace App\Http\Requests;

class EditAccountRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'password' => 'required|min:5|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.max' => 'O nome deve ter no máximo 100 caracteres!',
            'password.required_if' => 'A senha é obrigatória!',
            'password.min' => 'A senha deve ter no mínimo 5 caracteres!',
            'password.confirmed' => 'As senhas não correspondem!'
        ];
    }
}
