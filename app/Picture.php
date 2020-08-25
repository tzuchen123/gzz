<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['picture','product_id'];

  
    public function product()
    {
        return $this->belongsTo('App\product','product_id');
        // return $this->belongsTo('App\Post', 'foreign_key');
    }
}
