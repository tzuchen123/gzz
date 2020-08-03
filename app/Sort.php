<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    protected $fillable = ['title','subtitle','solgan','image'];

    public function products()
    {
        return $this->hasMany('App\Product','sort_id','id');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
}
