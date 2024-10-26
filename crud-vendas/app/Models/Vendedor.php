<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendedor extends Model
{
    
    use HasFactory, SoftDeletes;
    
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
