<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
 
    protected $table = 'products';
    protected $fillable =['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function ItemDetalhe() {
        return $this->hasOne('App\models\ItemDetalhe', 'product_id', 'id');
    }
    public function fornecedor() {
        return $this->belongsTo('App\models\Fornecedor');
    }
    public function pedidos() {
        return $this->belongsToMany('App\models\Pedido', 'pedidos_produtos', 'product_id', 'pedido_id');
    }
}
