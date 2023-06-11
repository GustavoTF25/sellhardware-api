<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Monolog\Handler\SendGridHandler;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest


{
    /**
     * Determina se um usuario eh autorizado a fazer essa requisição
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Pega as regras de validação que se aplicam a requisição
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
             'nome' => ['nullable', 'max:35'],
             'email' => ['required', 'email', 'max:30', 'unique:users'],
             'celular' => ['required', 'max:15'],
             'senha' => ['required', 'min:8']
            /*'email' => ['required','max:15','unique:users'],
            'senha' => ['required', 'min 8']*/ ];

        if ($this->method() === 'PATCH'){

            $rules['email'] = ['required', 'email', 'max:30', Rule::unique('users')->ignore($this->id),];
            
            $rules['senha'] = ['nullable', 'min:8'];
        }
        return $rules;
    }
}
