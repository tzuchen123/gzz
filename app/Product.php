<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','image','rank','status','sort_id','pic1','pic2','pic3'];

    public function pictures()
    {
        return $this->hasMany('App\Picture','product_id','id');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    public function sort()
    {
        return $this->belongsTo('App\Sort','sort_id');
        // return $this->belongsTo('App\Post', 'foreign_key');
    }


}
