<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table = 'catagories';

    protected $fillable = ['title'];


    public function articles()
    {
        return $this->hasMany('App\Article','catagory_id','id');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }


}

