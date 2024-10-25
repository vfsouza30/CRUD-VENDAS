<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'sexo',
        'email'
    ];

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'cliente_id');
    }
}
