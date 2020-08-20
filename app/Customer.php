<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'id',
        'name',
        'document',
    ];

    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
}
