<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','image','rank','status','sort_id','price','amount'];

    public function pictures()
    {
        return $this->hasMany('App\Picture','product_id','id');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    public function sort()
    {
        return $this->belongsTo('App\Sort');
        // return $this->belongsTo('App\Post', 'foreign_key');
    }


}
