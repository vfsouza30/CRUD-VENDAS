<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    
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
            'cpf' => 'required|digits:11',
            'sexo' => 'required|in:M,F',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf' =>'O campo cpf dever ser preenchido com 11 caracteres numerais',
            'sexo' => 'O campo sexo precisa ser preenchido',
            'email' => 'o campo e-mail precisa ser preenchido',
        ];
    }
}
