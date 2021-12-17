<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos() {
       // return $this->belongsToMany('App\models\Product', 'pedidos_produtos');
        return $this->belongsToMany('App\models\Item', 'pedidos_produtos', 'pedido_id', 'product_id')->withPivot('id', 'created_at');
    }
}
