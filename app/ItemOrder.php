<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemOrder extends Pivot
{
    protected $table = 'items_to_order';
    public $timestamps = false;
}
