<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendedorRequest extends FormRequest
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
            'cpf' => 'required|digits:11',
            'loja_id' => 'required|exists:lojas,id',
        ];
    }

    public function messages()
    {
        return [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf' =>'O campo CPF dever ser preenchido com 11 caracteres numerais',
            'loja_id.required' => 'O campo loja precisa ser preenchido',
            'loja_id.exists' => 'A loja selecionada não é válida',
        ];
    }
}
