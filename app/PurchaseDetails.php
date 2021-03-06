<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $fillable = [
        'purchase_id', 'product_id', 'items', 'price', 'total_price'
    ];

    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
