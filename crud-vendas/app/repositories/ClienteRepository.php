<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ClienteRepository
{
    public function cpfExists($cpf)
    {
        return DB::table('clientes')->where('cpf', $cpf)->exists();
    }

    public function emailExists($email)
    {
        return DB::table('clientes')->where('email', $email)->exists();
    }
}
