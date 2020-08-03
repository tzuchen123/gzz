<?php

namespace App\Services;

use App\Services\Service;
use App\Repositories\ArticleRepository;
// use Yish\Generators\Foundation\Service\Service;

class ArticleService extends Service
{
    protected $repo;
    protected $imageHandlerService;

    // 透過 DI 注入 Service
    public function __construct(
        ArticleRepository $repo,
        ImageHandlerService $imageHandlerService
    )
    {
        $this->repo = $repo;
        $this->imageHandlerService = $imageHandlerService;
    }

    public function create($data)
    {

        $data = $this->uploadAllImageInData($data, "article");
      
        $model = $this->repo->create($data);

        return $model;
    }

    public function update($data,$id)
    {
       
        $data = $this->uploadAllImageInData($data, "article");
       
        $model = $this->repo->update($data,$id);

        return $model;
    }


    public function getdatas()
    {
       
        // 商業邏輯
        return $this->repo->getdatas();
    }
    
}
