<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'produto_id', 'comprador_id', 'vendedor_id',
    ];

    public function comprador(){
        return $this->belongsTo(User::class, 'comprador_id');
    }

    public function vendedor(){
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function produto(){
        return $this->belongsTo(Product::class, 'produto_id');
    }
}
