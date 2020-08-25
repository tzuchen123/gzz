<?php

namespace App\Repositories;

use App\Picture;



class PictureRepository extends Repository
{
    protected $model;

    public function __construct(Picture $model)
    {
         $this->model = $model;
    }

    public function getDatas($id)
    {
         // 取資料邏輯
        return $this->model->where('product_id','=',$id)->get();
    }
    
}
