<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCart extends Model
{
    protected $table = 'items_to_cart';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
}
