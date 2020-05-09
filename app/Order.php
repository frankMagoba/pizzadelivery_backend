<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function items()
    {
        return $this->belongsToMany('App\Item','items_to_order')->withPivot([
            'quantity','price'
        ]);
    }
}
