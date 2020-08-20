<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id',
        'description',
        'price',
        'available',
    ];

    public function saleItem()
    {
        return $this->hasMany('App\SaleItem');
    }
}
