<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_id','product_count','discount','grand_total',
    ];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function saleDetails()
    {
        return $this->hasMany('App\SaleDetails');
    }
}
