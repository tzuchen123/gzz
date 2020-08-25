<?php

namespace App\Services;

use App\Services\Service;
use App\Repositories\ProductRepository;

// use Yish\Generators\Foundation\Service\Service;

class ProductService extends Service
{
    protected $repo;
    protected $imageHandlerService;
    // protected $savingData = ["title"];

    // 透過 DI 注入 Service
    public function __construct(
        ProductRepository $repo,
        ImageHandlerService $imageHandlerService
    )
    {
        $this->repo = $repo;
        $this->imageHandlerService = $imageHandlerService;
    }

    public function create($data)
    {

        $data = $this->uploadAllImageInData($data, "product");
      
        $model = $this->repo->create($data);

        return $model;
    }

    public function update($data,$id)
    {
       
        $data = $this->uploadAllImageInData($data, "product");
       
        $model = $this->repo->update($data,$id);

        return $model;
    }


    public function getDatas()
    {
       
        // 商業邏輯
        return $this->repo->getDatas();
    }

    
    public function getDatasBySort($sortId)
    {
        // 商業邏輯
        return $this->repo->getDatasBySort($sortId);
    }

    public function getHotDatas()
    {
       
        // 商業邏輯
        return $this->repo->getHotDatas();
    }
    

}
