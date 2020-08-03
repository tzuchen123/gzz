<?php

namespace App\Repositories;

use App\Picture;



class PictureRepository extends Repository
{
    protected $model;

    public function __construct(Picture $model)
    {
         $this->model = $model;
    }
}
