<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'usuario_id', 'nome', 'preco', 'vendido', 'descricao', 'fotos'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}
