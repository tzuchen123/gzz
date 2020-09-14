<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Services\SortService;
use App\Services\BannerService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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

    public function addItemToCart(Request $request)
    {
        $productId = $request->productId;
        $product = $this->productService->findById($productId);

        \Cart::add(array(
            'id' => $productId,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array()
        ));

        // if (Auth::check()) {
        //     $userId = auth()->user()->id; // or any string represents user identifier
        //     \Cart::session($userId)->add($productId, $product->name, $product->price, 1, array());
        // }

        $cartTotalQuantity = \Cart::getTotalQuantity();
        return  $cartTotalQuantity;
      
    }

    public function cart()
    {
        // $cartCollection_old = \Cart::getContent();
        // $userId = auth()->user()->id;

        // foreach ($cartCollection_old as $item) {
        //     $product_id = $item->id;
        //     $prduct_name = $item->name;
        //     $prduct_price = $item->price;
        //     $prduct_quantity = $item->quantity;
        //     \Cart::remove($product_id);
        //     \Cart::session($userId)->add($product_id, $prduct_name, $prduct_price,  $prduct_quantity, array());
        // }

        // $content = \Cart::session($userId)->getContent()->sort();
        // $total = \Cart::session($userId)->getTotal();

        $content = \Cart::getContent();
        $total = \Cart::getTotal();
       

        $sorts = $this->sortService->all();
      
        return view('frontend.cart.cart',compact('sorts',"total", "content"));
    }

    
    public function updateQuantity(Request $request)
    {
        //更改購物車產品數量
        $productId = $request->productId;
        $newQuantity = $request->newQuantity;

        // $userId = auth()->user()->id; // or any string represents user identifier
        // \Cart::session($userId)->update($productId, array(
        //     'quantity' => array(
        //         'relative' => false,
        //         'value' => $product_quantity
        //     ),
        // ));

        \Cart::update($productId, array(
                'quantity' => array(
                'relative' => false,
                'value' => $newQuantity
            ),
        ));

       

        return "Success";
    }

    
    public function deleteItemInCart(Request $request)
    {
        //刪除購物車物品
        $productId = $request->productId;

        // $userId = auth()->user()->id; // or any string represents user identifier
        // \Cart::session($userId)->remove($product_id);

        \Cart::remove($productId);
        
        return "Success";
    }


  


    
}
