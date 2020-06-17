<?php

namespace App\Repositories;
use App\Sort;
use App\Repositories\Repository;


class SortRepository extends Repository 
{
    protected $model;

    public function __construct(Sort $model)
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
