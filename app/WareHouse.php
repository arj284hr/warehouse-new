<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    public function customer()
    {
        return $this->hasMany('App\InOutLoad', 'customer_id', 'id');
    }

    public function bill_to()
    {
        return $this->hasMany('App\InOutLoad', 'bill_to_id', 'id');
    }
}
