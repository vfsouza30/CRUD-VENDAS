<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendedorRequest extends FormRequest
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

        $seller = $this->route('vendedor')->id;
        
        return [
            'nome' => 'required',
            'cpf' => [
                'required',
                'digits:11',
                'unique:vendedores,cpf,' . $seller . 'id',
            ],
            'loja_id' => 'required|exists:lojas,id',
            
        ];
    }

    public function messages()
    {
        return [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf.required' =>'O campo CPF dever ser preenchido com 11 caracteres numerais',
            'cpf.unique' => 'O CPF já existe na tabela vendedores.',
            'loja_id.required' => 'O campo loja precisa ser preenchido',
            'loja_id.exists' => 'A loja selecionada não é válida',
        ];
    }

}
