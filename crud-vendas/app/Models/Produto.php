<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'cor', 
        'preco'
    ];

    public function vendas()
    {
        return $this->hasMany(vendaProduto::class, 'produto_id');
    }
}
