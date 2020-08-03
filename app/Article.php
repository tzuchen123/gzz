<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['image','title','content','rank','status','catagory_id'];

    public function tags()
    {
        // return $this->belongsToMany('App\SchoolInfo', 'school_school_info', 'school_id', 'school_info_id');
        return $this->belongsToMany('App\Tag', 'article_tag', 'article_id', 'tag_id');
    }
}
