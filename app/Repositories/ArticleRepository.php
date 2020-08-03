<?php

namespace App\Repositories;

use App\Article;
use App\Repositories\Repository;


class ArticleRepository extends Repository
{
    protected $model;

    public function __construct(Article $model)
    {
         $this->model = $model;
    }

    public function getdatas()
    {
         // 取資料邏輯
        return $this->model
            ->orderby('rank','asc')
            ->paginate(10);
    }
}
