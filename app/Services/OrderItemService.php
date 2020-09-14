<?php

namespace App\Services;

use App\Repositories\OrderItemRepository;

class OrderItemService extends Service
{
    protected $repo;
    protected $imageHandlerService;
    // protected $savingData = ["title"]

    // 透過 DI 注入 Service
    public function __construct(
        OrderItemRepository $repo
    ) {
        $this->repo = $repo;
    }

    public function create($id)
    {
       
        $content = \Cart::getContent();
       
        foreach ($content as $item) {
            
            $data = [
                "order_id" => $id,
                "product_id" => $item->id,
                'quantity' => $item->quantity,
            ];
          
            $model = $this->repo->create(
                $data
            );
        }
      
        return $model;
    }
}
