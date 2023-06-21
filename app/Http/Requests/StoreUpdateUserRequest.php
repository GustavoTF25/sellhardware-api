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
             'nome' => ['required', 'max:35'],
             'email' => ['required', 'email', 'max:30', 'unique:users'],
             'celular' => ['nullable', 'max:15'],
             'senha' => ['required', 'min:8'],
             'id_endereco' => ['nullable']];

        if ($this->method() === 'PUT'){
            $rules['email'] = ['required', 'email', 'max:30', Rule::unique('users')->ignore($this->id),];
            $rules['senha'] = ['nullable', 'min:8'];
            $rules['rua'] = ['required'];
            $rules['bairro'] = ['nullable'];
            $rules['cidade'] = ['nullable'];
            $rules['estado'] = ['nullable'];
        }
        return $rules;
    }
}