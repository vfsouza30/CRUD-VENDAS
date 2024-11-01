<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class LojaRepository
{
    public function cnpjExists($cnpj)
    {
        return DB::table('lojas')->where('cnpj', $cnpj)->exists();
    }

}
