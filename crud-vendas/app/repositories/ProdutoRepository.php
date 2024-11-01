<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ProdutoRepository
{
    public function productExists($nome, $cor, $preco)
    {
        return DB::table('produtos')
            ->where('nome', $nome)
            ->where('cor', $cor)
            ->where('preco', $preco)
            ->exists();
    }

}
