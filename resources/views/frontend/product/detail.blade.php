@extends('layouts.frontend')

@section('content')
<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center"
            data-background="https://img.alicdn.com/imgextra/i1/601341923/TB2am_3tfuSBuNkHFqDXXXfhVXa_!!601341923-0-daren.jpg_2200x2200Q50s50.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>product Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="product_img_slide owl-carousel">
                        @foreach ($product->pictures as $picture)
                        <div class="single_product_img">
                            <img src="{{$picture->picture}}" alt="#" class="img-fluid">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="single_product_text text-center">
                        <h3>{{$product->title}}</h3>
                        <p>
                            {{$product->description}}
                        </p>
                        <div class="card_area">
                            <h3>${{$product->price}}</h3>
                            <br>
                            {{-- <div class="product_count_area">
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" type="text" value="1" min="0"
                                        max="10">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <h5>個</h5>
                            </div>
                             --}}

                            <div class="add_to_cart">
                                <button class="btn btn-danger addcart" data-productId="{{$product->id}}">加入購物車</button>
                                
                                {{-- <a href="/cart"> <button class="btn btn-danger addcart">>go to cart</button></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@section('js')
<script>
    //把產品id送到後台
    $('.addcart').click(function () {
    // var productId = $(this).data('productId');
    var productId  = $(this).attr("data-productId")
    console.log(productId)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });

    $.ajax({
        method: 'POST',
        url: '/cart/addItemToCart',
        data: {
            productId:productId
            },
        success: function (res) {
            $('#totalQuantity').text(res);
            console.log(res)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(textStatus + " " + errorThrown);
        }
    });
});

</script>
@endsection