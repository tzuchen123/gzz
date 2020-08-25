<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use App\Services\SortService;
use App\Services\BannerService;
use App\Services\ProductService;

class IndexController extends Controller
{
    protected $bannerService;
    protected $sortService;
    protected $productService;

    // 透過 DI 注入 Service
    public function __construct(
        BannerService $bannerService,
        SortService $sortService,
        ProductService $productService
        )
    {
        $this->bannerService = $bannerService;
        $this->sortService = $sortService;
        $this->productService = $productService;

    }


    
    public function index()
    {
        $banners = $this->bannerService->getIndexDatas();
        $sorts = $this->sortService->all();
        // 熱銷商品
        $hotProducts = $this->productService->getHotDatas();
        return view('frontend.index',compact('banners','sorts','hotProducts'));
    }

    public function merchandise(Request $request)
    {
        //商品總頁
       
        $sorts = $this->sortService->all();
        $products = $this->productService->getDatasBySort($request->sortId);
  
        return view('frontend.product.index',compact('sorts','products'));

    }

    public function product(Request $request)
    {
      
        //商品詳細頁
        $sorts = $this->sortService->all();
        $product = $this->productService->findById($request->productId);
      
     
        return view('frontend.product.detail',compact('sorts','product'));

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
