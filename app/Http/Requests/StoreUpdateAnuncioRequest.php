<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use app\Models\Anuncio;
class StoreUpdateAnuncioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
             
            'titulo' => ['required', 'min:3', 'max:40'],
            'quantitdade' => ['required' , 'min:1'], 
            'preco' => ['required'],
            'condicao_produto' => ['required'],
            'status_anuncio' => ['required'],
            'descricao' => ['nullable'],
            'observacoes' => ['required', 'min:15']
        ];
    }
}
