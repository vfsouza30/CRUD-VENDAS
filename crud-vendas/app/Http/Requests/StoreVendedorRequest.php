<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\VendedorRepository;

class StoreVendedorRequest extends FormRequest
{
    protected $vendedorRepository;

    public function __construct(VendedorRepository $vendedorRepository)
    {
        
        $this->vendedorRepository = $vendedorRepository;
    }

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

        $vendedorId = $this->id;

        return [
            'nome' => 'required',
            'cpf' => 'required|digits:11',
            'loja_id' => 'required|exists:lojas,id',
            
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->cpfExists()) {
                $validator->errors()->add('cpf', 'O CPF já existe na tabela vendedores.');
            }
        });
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

    protected function cpfExists()
    {
        return $this->vendedorRepository->cpfExists($this->cpf);
    }
}
