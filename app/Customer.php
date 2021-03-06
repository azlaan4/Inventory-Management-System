<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'type', 'number', 'address'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
