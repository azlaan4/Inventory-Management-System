<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    protected $fillable = [
        'sale_id', 'product_id', 'items', 'price', 'total_price'
    ];

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
