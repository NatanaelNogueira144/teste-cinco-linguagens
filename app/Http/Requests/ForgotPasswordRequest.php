<?php

namespace App\Http\Requests;

class ForgotPasswordRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email'
        ];
    }

    public function messages(): array 
    {
        return [
            'email.required' => 'O email é obrigatório!',
            'email.email' => 'Este email é inválido!'
        ];
    }
}
