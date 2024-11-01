<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\ClienteRepository;

class StoreClienteRequest extends FormRequest
{
    protected $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        parent::__construct();
        $this->clienteRepository = $clienteRepository;
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required',
            'cpf' => 'required|digits:11',
            'sexo' => 'required|in:M,F',
            'email' => 'required|email'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->cpfExists()) {
                $validator->errors()->add('cpf', 'O CPF já existe na tabela clientes.');
            }
            if ($this->emailExists()) {
                $validator->errors()->add('email', 'O Email já existe na tabela clientes.');
            }
        });
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

    protected function cpfExists()
    {
        return $this->clienteRepository->cpfExists($this->cpf);
    }

    protected function emailExists()
    {
        return $this->clienteRepository->emailExists($this->email);
    }
}