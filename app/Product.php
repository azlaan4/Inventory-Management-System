<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand_id', 'category_id', 'size', 'unit', 'price', 'mrp', 'status', 'stock'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }
}
