<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateUserRequest extends BaseRequest
{
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT') {
            return [
                'name' => 'required|max:100',
                'email' => ['required', Rule::unique('users')->ignore($this->user)],
                'password' => [Rule::requiredIf(!$this->user), 'nullable', 'min:5', 'confirmed']
            ];
        } else {
            return [
                'name' => 'sometimes|required|max:100',
                'email' => ['sometimes', 'required', Rule::unique('users')->ignore($this->user)],
                'password' => ['sometimes', Rule::requiredIf(!$this->user), 'nullable', 'min:5', 'confirmed']
            ];
        }
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.max' => 'O nome deve ter no máximo 100 caracteres!',
            'email.required' => 'O email é obrigatório!',
            'email.email' => 'O email é inválido!',
            'email.unique' => 'O email informado já está em uso! Tente outro.',
            'password.required_if' => 'A senha é obrigatória!',
            'password.min' => 'A senha deve ter no mínimo 5 caracteres!',
            'password.confirmed' => 'As senhas não correspondem!'
        ];
    }
}
