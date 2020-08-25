@extends('layouts.frontend')

@section('content')
<main>

    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($content as $content)
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="assets/img/arrivel/arrivel_1.png" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>{{$content->name}}</p>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <h5>{{$content->price}}</h5>
                                </td>

                                <td>
                                    <input type="text" class="quantity" name="quantity" value=" {{ $content->quantity}}"
                                        data-productId="{{ $content->id}}">
                                </td>

                                <td>
                                    <h5>{{$content->getPriceSum()}} </h5>
                                </td>

                                <td>
                                    <button class="btn-danger btm-sm" data-productId="{{ $content->id}}">x</button>
                                </td>
                            </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>{{$total}}</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                    <a class="btn" href="{{route('frontend.index')}}">Continue Shopping</a>
                        <a class="btn checkout" href="{{route('frontend.cart.checkout')}}">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
</main>
@endsection

@section('js')


<script>
    //刪除商品
$('.btn-danger').on('click', function() {
var productId = $(this).attr("data-productId")
 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({
    url: '/deleteItemInCart',                 // url位置
    type: 'post',                                    // post/get
    data: { productId: productId,},                // 輸入的資料
    error: function (jqXHR, textStatus, errorThrown) {                         // 錯誤後執行的函數
        console.error(textStatus + " " + errorThrown);
    },
    success: function (res) {        
        console.log(res)               // 成功後要執行的函數
        document.location.reload(true);             //重整頁面
    }
});


});

//當inpuu有變化的時候，抓到它，送到後端
$('.quantity').on('change', function() {
//把新的數量存起來
var newQuantity = $(this).val();
console.log(newQuantity);    
//抓產品id
var productId = $(this).attr("data-productId")
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $.ajax({
    url: 'updateQuantity',                        
    type: 'post',                                  
    data: 
        { 
        productId: productId,
        newQuantity: newQuantity
        },         
    error: function (jqXHR, textStatus, errorThrown) {                        
        console.error(textStatus + " " + errorThrown);
    },
    success: function (res) {        
        console.log(res)              
        document.location.reload(true);             
    }
});


});




</script>

@endsection