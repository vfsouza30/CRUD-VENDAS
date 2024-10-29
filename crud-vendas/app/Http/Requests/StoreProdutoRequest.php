<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'cor' => 'required',
            'preco' => 'required|regex:/^\d{1,3}(\.\d{3})*(,\d{2})?$/',
        ];
    }

    public function messages()
    {
        return [
            'nome' => 'O campo nome precisa ser preenchido',
            'cor' =>'O campo cor dever ser preenchido com 14 caracteres numerais',
            'preco' => 'O campo valor inválido',
        ];
    }
}
