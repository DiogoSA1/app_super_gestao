<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];


    public function produtoDetalhe() {
        return $this->hasOne('App\models\ProductsDetail');
    }
}
