<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'supplier_id',
    ];

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }
}
