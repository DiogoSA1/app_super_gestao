<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;

    protected $table = 'products_details';
    protected $fillable = ['product_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item() {
        return $this->belongsTo('App\Models\Item', 'product_id', 'id');
    }
}
