<?php

namespace App\Http\Requests;

class UpdateLanguageRequest extends BaseRequest
{
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT') {
            return [
                'name' => 'required|max:30'
            ];
        } else {
            return [
                'name' => 'sometimes|required|max:30'
            ];
        }
    }

    public function messages(): array 
    {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.max' => 'O nome deve ter no máximo 30 caracteres!'
        ];
    }
}
