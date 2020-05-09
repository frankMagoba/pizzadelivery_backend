<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    public $timestamps = false;

    public function items()
    {
        return $this->belongsToMany('App\Item','items_to_cart')->withPivot([
            'quantity',
        ]);
    }
}
