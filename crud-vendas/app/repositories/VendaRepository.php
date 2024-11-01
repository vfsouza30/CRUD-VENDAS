<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class VendaRepository
{

    public function getAllSales()
    {
        return DB::table('vendas')
        ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
        ->join('lojas', 'vendas.loja_id', '=', 'lojas.id')
        ->join('vendedores', 'vendas.vendedor_id', '=', 'vendedores.id')
        ->whereNull('vendas.deleted_at')
        ->select(
            'vendas.*', 'lojas.nome AS loja_nome', 
            'clientes.nome AS cliente_nome', 
            'vendedores.nome AS vendedor_nome',
        )
        ->get()
        ->map(function ($sale) {
            return (array) $sale;
        })
        ->toArray();
    }

}