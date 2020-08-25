<?php

namespace App\Repositories;

use App\Banner;
use App\Repositories\Repository;


class BannerRepository extends Repository
{
    protected $model;

    public function __construct(Banner $model)
    {
         $this->model = $model;
    }

    public function getDatas()
    {
         // 取資料邏輯
        return $this->model
            ->orderby('rank','asc')
            ->get();
    }

    public function getIndexDatas()
    {
         // 取資料邏輯
        return $this->model
            ->orderby('rank','asc')
            ->where('status','1')
            ->get();
    }


}
