<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMenu extends Model
{
    protected $table = 'pizza_to_menu';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
}
