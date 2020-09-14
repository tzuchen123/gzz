<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use TsaiYiHua\ECPay\Checkout;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\OrderItemService;
use TsaiYiHua\ECPay\Services\StringService;


class OrderController extends Controller
{
    protected $checkout;
    protected $productService;
    protected $orderService;
    protected $orderItemService;

    public function __construct(
        Checkout $checkout,
        ProductService $productService,
        OrderService $orderService,
        OrderItemService $orderItemService
    ) {
        $this->checkout = $checkout;
        $this->productService = $productService;
        $this->orderService = $orderService;
        $this->orderItemService = $orderItemService;
    }

    public function checkout()
    {
        // $content = \Cart::session($userId)->getContent()->sort();
        // $total = \Cart::session($userId)->getTotal();
        $content = \Cart::getContent();
        $total = \Cart::getTotal();

        return view('frontend.order.checkout', compact('total', 'content'));
    }

    public function SendCheckout(Request $request)
    {
      
        // 存到order
        $model = $this->orderService->create(
            $request->except("_token")
        );

        //(訂單編號)存入orderItem
        $this->orderItemService->create(
            $model->id
        );
      
        //綠界
        $cartContents = \Cart::getContent()->sort();
        $items = [];
        foreach ($cartContents as $item) {
            $product = $this->productService->findById($item->id);
            $new_ary = [
                'name' => $product->title,
                'qty' => $item->quantity,
                'price' => $item->price,
                'unit' => '個'
            ];

            array_push($items, $new_ary);
        }


        $formData = [
            'UserId' => 1, // 用戶ID , Optional
            'ItemDescription' => '產品簡介',
            'Items' => $items,
            'OrderId' => $model->order_id,
            'PaymentMethod' => 'Credit', // ALL, Credit, ATM, WebATM
        ];

        //清空購物車
        // \Cart::clear();

        //送訂單給綠界
        // return $this->checkout->setPostData($formData)->send();
   
        return $this->checkout
            ->setNotifyUrl(route('notify'))
            ->setReturnUrl(route('return'))
            ->setPostData($formData)
            ->send();
    }

    public function notifyUrl(Request $request)
    {
        //當消費者付款完成後，綠界會將付款結果參數以幕後(Server POST)回傳到該網址。
        //判斷檢查碼是否相符
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            //檢查碼相符後，回應 1|OK
            return '1|OK';
        } else {
            return '0|FAIL';
        }
    }

    public function returnUrl(Request $request)
    {
        //付款完成後，綠界會將付款結果參數以幕前(Client POST)回傳到該網址
        //判斷檢查碼是否相符
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            if (!empty($request->input('redirect'))) {
                return redirect($request->input('redirect'));
            } else {
                //收到顧客付款完成，把訂單狀態改為已付款
                //$serverPost(綠界回傳資訊)，MerchantTradeNo我們先前傳的OrderId
                // $orderId = $serverPost['MerchantTradeNo'];
                $this->orderService->changeStatus(
                    'paymentDone',
                    $serverPost['MerchantTradeNo']
                );
            
                //導回我們自己的網頁
                return redirect()->route('frontend.order.confirmation');
            }
        }
    }


    public function confirmation()
    {
        
        // //付款結果顯示頁
        // $order =$this->orderService->getInfo($orderId);
      
        return view('frontend.order.confirmation');
    }
}
