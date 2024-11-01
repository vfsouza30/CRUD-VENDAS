<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $client = $this->route('cliente')->id;
        return [
            'nome' => 'required',
            'cpf' => [
                'required',
                'digits:11',
                'unique:clientes,cpf,' . $client . 'id',
            ],
            'sexo' => 'required|in:M,F',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf.required' =>'O campo cpf dever ser preenchido com 11 caracteres numerais',
            'cpf.unique' => 'O CPF já existe na tabela clientes.',
            'sexo' => 'O campo sexo precisa ser preenchido',
            'email' => 'o campo e-mail precisa ser preenchido',
        ];
    }
}