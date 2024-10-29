<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLojaRequest extends FormRequest
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
            'cnpj' => 'required|digits:14',
            'cep' => 'required|digits:8',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required|size:2|not_in:D',
        ];
    }

    public function messages()
    {
        return [
            'nome' => 'O campo nome precisa ser preenchido',
            'cnpj' =>'O campo CNPJ dever ser preenchido com 14 caracteres numerais',
            'cep' => 'O campo CEP precisa ser preenchido com 8 caracteres numerais',
            'endereco' => 'O campo endereço precisa ser preenchido',
            'bairro' => 'O campo bairro precisa ser preenchido',
            'cidade' => 'O campo cidade precisa ser preenchido',
            'uf' => 'UF invalida',
        ];
    }
}
