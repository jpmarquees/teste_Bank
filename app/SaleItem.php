<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{

    protected $table = 'sale_item';

    protected $fillable = [
        'id',
        'product_id',
        'sale_id',
        'productPrice',
        'soldQuantity',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
