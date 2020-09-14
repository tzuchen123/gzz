<?php

namespace App\Repositories;

use App\OrderItem;
use App\Repositories\Repository;

class OrderItemRepository extends Repository
{
    protected $model;

    public function __construct(OrderItem $model)
    {
         $this->model = $model;
    }
}
