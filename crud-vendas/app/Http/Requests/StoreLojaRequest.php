<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\LojaRepository;

class StoreLojaRequest extends FormRequest
{
    protected $lojaRepository;

    public function __construct(LojaRepository $lojaRepository)
    {
        parent::__construct();
        $this->lojaRepository = $lojaRepository;
    }

    public function authorize(): bool
    {
        return true;
    }


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

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->cnpjExists()) {
                $validator->errors()->add('cnpj', 'O CNPJ já existe na tabela Lojas.');
            }
        });
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

    protected function cnpjExists()
    {
        return $this->lojaRepository->cnpjExists($this->cnpj);
    }
}
