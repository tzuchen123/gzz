<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\Repository;


class ProductRepository extends Repository
{
    protected $model;

    public function __construct(Product $model)
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
