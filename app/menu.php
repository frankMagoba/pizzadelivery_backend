<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menu';
    public $timestamps = false;

    public function items()
    {
        return $this->belongsToMany('App\Item','pizza_to_menu')->withPivot([
            'quantity',
        ]);
    }
}
