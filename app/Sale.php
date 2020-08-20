<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale';

    protected $fillable = [
        'id',
        'customer_id',
        'totalPrice',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function saleItem()
    {
        return $this->hasMany('App\SaleItem');
    }
}

