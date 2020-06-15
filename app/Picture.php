<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model

{
    protected $fillable = ['image','product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
        // return $this->belongsTo('App\Post', 'foreign_key');
    }

}
