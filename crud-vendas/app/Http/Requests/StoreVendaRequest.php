<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendaRequest extends FormRequest
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
            'cliente_id' => 'required|exists:clientes,id',
            'loja_id' => 'required|exists:lojas,id',
            'vendedor_id' => 'required|exists:vendedores,id',
            'produto_id' => 'required|exists:produtos,id',
            'produto_quantidade' => 'required|array',
            'produto_quantidade.*' => 'required|numeric|min:1',
            'forma_pagamento' => 'required|in:dinheiro,credito,debito',
            'valor_total' => 'required|numeric|min:1',
            'observacao' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'cliente_id' => 'O campo cliente precisa ser preenchido',
            'loja_id' => 'O campo loja precisa ser preenchido',
            'vendedor_id' => 'O campo vendedor precisa ser preenchido',
            'produto_id' => 'É necessário pelo menos 1 produto',
            'produto_quantidade' => 'É necessario pelo menos 1 quantidade do produto',
            'forma_pagamento' => 'O campo Forma de Pagamento precisa ser preenchido',
            'valor_total' => 'Valor Total inválido',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'valor_total' => str_replace(['.', ','], ['', '.'], $this->valor_total),
        ]);
    }
}
