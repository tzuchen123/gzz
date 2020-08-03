<?php

namespace App\Repositories;

use App\Catagory;
use App\Repositories\Repository;

// use Yish\Generators\Foundation\Repository\Repository;

class CatagoryRepository extends Repository
{
    protected $model;

    public function __construct(Catagory $model)
    {
         $this->model = $model;
    }
}
