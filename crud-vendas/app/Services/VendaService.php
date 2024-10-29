<?php

namespace App\Services;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaService
{
    public function getSalesReport(Request $request)
    {
        $query = Venda::with(['loja', 'cliente', 'vendedor', 'vendaProdutos']);

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->input('created_at'));
        }

        if ($request->filled('nome_cliente')) {
            $query->whereHas('cliente', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->input('nome_cliente') . '%');
            });
        }

        if ($request->filled('nome_loja')) {
            $query->whereHas('loja', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->input('nome_loja') . '%');
            });
        }

        if ($request->filled('nome_vendedor')) {
            $query->whereHas('vendedor', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->input('nome_vendedor') . '%');
            });
        }

        return $query->get()->map(function ($sale) {
            return [
                'venda_id' => $sale->id,
                'nome_loja' => $sale->loja->nome,
                'nome_cliente' => $sale->cliente->nome,
                'nome_vendedor' => $sale->vendedor->nome,
                'valor_total' => $sale->valor_total,
                'quantidade_produtos' => $sale->vendaProdutos->sum('quantidade'),
                'forma_pagamento' => $sale->forma_pagamento,
                'observacao' => $sale->observacao,
            ];
        });
    }
}