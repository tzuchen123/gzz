<?php

namespace App\Repositories;

use App\Tag;
use App\Repositories\Repository;
// use Yish\Generators\Foundation\Repository\Repository;

class TagRepository extends Repository
{
    protected $model;

    public function __construct(Tag $model)
    {
         $this->model = $model;
    }

    public function getdatas()
    {

         // 取資料邏輯
        return $this->model
            ->where('status', 1)
            ->orderby('rank','asc')
            ->get();
    }
}
