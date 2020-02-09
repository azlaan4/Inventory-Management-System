<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'type', 'number', 'address'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
}
