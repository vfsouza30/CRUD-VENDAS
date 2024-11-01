<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class VendedorRepository
{
    public function cpfExists($cpf)
    {
        return DB::table('vendedores')->where('cpf', $cpf)->exists();
    }

    public function getAllSellers()
    {
        return DB::table('vendedores')
            ->join('lojas', 'vendedores.loja_id', '=', 'lojas.id')
            ->whereNull('vendedores.deleted_at')
            ->select('vendedores.*', 'lojas.nome AS loja_nome')
            ->get()
            ->map(function ($seller) {
                return (array) $seller;
            })->toArray();
    }

}