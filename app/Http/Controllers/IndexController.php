<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use App\Services\SortService;
use App\Services\BannerService;

class IndexController extends Controller
{
    protected $bannerService;
    protected $sortService;

    // 透過 DI 注入 Service
    public function __construct(BannerService $bannerService,SortService $sortService)
    {
        $this->bannerService = $bannerService;
        $this->sortService = $sortService;

    }


    
    public function index()
    {
        $banners = $this->bannerService->getdatas();
        $sorts = $this->sortService->all();

        return view('frontend.index',compact('banners','sorts'));
    }

    public function product()
    {
        return view('frontend.product');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
