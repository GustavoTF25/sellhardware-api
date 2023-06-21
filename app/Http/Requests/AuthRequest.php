<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determina se o usuário é autorizado a fazer a request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Pega as regras de validação para concluir a requisição
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:30'],
            'senha' => ['required', 'min:8']
        ];
    }
}
