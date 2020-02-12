<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'supplier_id','product_count','discount','grand_total',
    ];

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }
}
