<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loja extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'cnpj',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'uf'
    ];

    public function vendedores()
    {
        return $this->hasMany(Vendedor::class, 'loja_id');
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'loja_id');
    }
}
