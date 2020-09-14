<?php

namespace App\Services;

use Carbon\Carbon;
use App\Services\Service;
use Darryldecode\Cart\Cart;
use App\Repositories\OrderRepository;
use App\Repositories\OrderItemRepository;


class OrderService extends Service
{
    protected $repo;
    protected $imageHandlerService;
    // protected $savingData = ["title"]

    // 透過 DI 注入 Service
    public function __construct(
        OrderRepository $repo,
        OrderItemRepository $orderItemRepo
    )
    {
        $this->repo = $repo;
        $this->orderItemRepo = $orderItemRepo;
    }

    public function create($data)
    {
        
        $data["order_id"] = config('app.name') . Carbon::now()->format('YmdHi');
        $model = $this->repo->create($data);
       
        return $model;
    }

    
    public function changeStatus($status,$orderId)
    {  
        
        return $this->repo->update(array('status' => $status), $orderId,'order_id');
    }
}
