<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    
    use HasFactory;
    protected $table = 'vendedores';

    protected $fillable = [
        'loja_id',
        'nome',
        'cpf'
    ];

    public function loja()
    {
        return $this->belongsTo(Loja::class, 'loja_id');
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'vendedor_id');
    }
}
