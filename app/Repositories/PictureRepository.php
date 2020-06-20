<?php

namespace App\Repositories;

use App\Picture;
use App\Repositories\Repository;
// use Yish\Generators\Foundation\Repository\Repository;

class PictureRepository extends Repository
{
    protected $model;

    public function __construct(Picture $model)
    {
         $this->model = $model;
    }

    public function getDatasByProductId($id)
    {
         // 取資料邏輯
        return $this->model->where('product_id','=',$id)->get();
    }

}
