<?php

namespace App\Http\Requests;

class UpdateQuestionRequest extends BaseRequest
{
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT') {
            return [
                'description' => 'required|max:200'
            ];
        } else {
            return [
                'description' => 'sometimes|required|max:200'
            ];
        }
    }

    public function messages(): array 
    {
        return [
            'description.required' => 'A descrição é obrigatória!',
            'description.max' => 'A descrição deve ter no máximo 200 caracteres!'
        ];
    }
}
