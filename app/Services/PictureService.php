<?php

namespace App\Services;

use App\Services\Service;
use Illuminate\Support\Arr;
use App\Repositories\PictureRepository;
// use Yish\Generators\Foundation\Service\Service;

class PictureService extends Service
{
    protected $repo;
    protected $imageHandlerService;
    protected $savingData = ["image", 'product_id'];

    // 透過 DI 注入 Service
    public function __construct(
        PictureRepository $repo,
        ImageHandlerService $imageHandlerService
    ) {
        $this->repo = $repo;
        $this->imageHandlerService = $imageHandlerService;
    }

    public function create($data)
    {


        if (array_key_exists('picture', $data)) {
            $pictures = Arr::pull($data, 'picture');

            $product_id = Arr::pull($data, 'productId');

            //處理圖片，把圖片變成字串
            $pictures = $this->uploadAllImageInData($pictures, "picture");


            foreach ($pictures as $picture) {

                $data = ['picture' => $picture, 'product_id' => $product_id];
                $model = $this->repo->create($data);
            }

            return $model;
        }
    }


    public function getDatas($id)
    {
        // 取資料邏輯
        return $this->repo->getDatas($id);
    }
}
