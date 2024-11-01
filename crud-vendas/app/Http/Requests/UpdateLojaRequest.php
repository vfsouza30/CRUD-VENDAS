<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLojaRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $store = $this->route('loja')->id;

        return [
            'nome' => 'required',
            'cnpj' => [
                'required',
                'digits:14',
                'unique:lojas,cnpj,' . $store . 'id',   
            ],
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
            'cnpj.required' =>'O campo CNPJ dever ser preenchido com 14 caracteres numerais',
            'cnpj.unique' => 'O CNPJ já existe na tabela Loja.',
            'cep' => 'O campo CEP precisa ser preenchido com 8 caracteres numerais',
            'endereco' => 'O campo endereço precisa ser preenchido',
            'bairro' => 'O campo bairro precisa ser preenchido',
            'cidade' => 'O campo cidade precisa ser preenchido',
            'uf' => 'UF invalida',
        ];
    }

}
