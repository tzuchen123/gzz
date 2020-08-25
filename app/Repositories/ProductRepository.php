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

    public function getDatas()
    {
         // 取資料邏輯
        return $this->model
            ->orderby('rank','asc')
            ->paginate(10);
    }

    public function getDatasBySort($sortId)
    {
         // 取資料邏輯
        return $this->model
            ->orderby('rank','asc')
            ->where('sort_id',$sortId)
            ->where('status','1')
            ->paginate(10);
    }

    public function getHotDatas()
    {
         // 取資料邏輯
        return $this->model
            ->orderby('rank','asc')
            ->where('hot','1')
            ->paginate(10);
    }
}
