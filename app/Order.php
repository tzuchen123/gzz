<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id','name','phone','address','email','id_number'];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
    
}

