<?php

namespace App\Repositories;
use App\Order;
use App\Repositories\Repository;


class OrderRepository extends Repository
{
    protected $model;

    public function __construct(Order $model)
    {
         $this->model = $model;
    }

    public function getInfo($id)
    {
      return $this->model->where($id,'=','order_id');
    }
    
}
