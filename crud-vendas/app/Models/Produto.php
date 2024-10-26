<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

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
