<?php

namespace App\Services;

use App\Services\Service;
use App\Repositories\CatagoryRepository;



class CatagoryService extends Service
{
    protected $repo;
    protected $imageHandlerService;
    protected $savingData = ["title"];

    // 透過 DI 注入 Service
    public function __construct(
        CatagoryRepository $repo,
        ImageHandlerService $imageHandlerService
    )
    {
        $this->repo = $repo;
        $this->imageHandlerService = $imageHandlerService;
    }

    public function create($data)
    {
        $data = $this->uploadAllImageInData($data, "banner");
        $model = $this->repo->create($data);
       
        return $model;
    }

    public function update($data,$id)
    {
        // dd($model);
        // dd($data);
        $data = $this->uploadAllImageInData($data, "banner");

        $model = $this->repo->update($data,$id);

        return $model;
    }

}
