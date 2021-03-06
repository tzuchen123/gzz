<?php

namespace App\Services;

use App\Services\Service;
use App\Repositories\SortRepository;
// use Yish\Generators\Foundation\Service\Service;

class SortService extends Service
{
    protected $repo;
    protected $imageHandlerService;
    protected $savingData = ["title",'subtitle','solgan','image'];

    // 透過 DI 注入 Service
    public function __construct(
        SortRepository $repo,
        ImageHandlerService $imageHandlerService
    )
    {
        $this->repo = $repo;
        $this->imageHandlerService = $imageHandlerService;
    }

    public function create($data)
    {

        $data = $this->uploadAllImageInData($data, "sort");

        $model = $this->repo->create($data);

        return $model;
    }

    public function update($data,$id)
    {
        // dd($model);
        // dd($data);
        $data = $this->uploadAllImageInData($data, "sort");

        $model = $this->repo->update($data,$id);

        return $model;
    }


    public function getDatas()
    {
        // 商業邏輯
        return $this->repo->getDatas();
    }

}
