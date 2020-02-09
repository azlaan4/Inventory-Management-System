<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $fillable = [
        'purchase_id', 'product_id', 'items', 'price',
    ];

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
