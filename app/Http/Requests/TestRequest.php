<?php

namespace App\Http\Requests;

class TestRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'answers' => 'required|array|min:10'
        ];
    }

    public function messages(): array
    {
        return [
            'answers.required' => 'Marcar ao menos uma resposta é obrigatório!',
            'answers.min' => 'Você deve marcar ao menos 10 das perguntas!'
        ];
    }
}
