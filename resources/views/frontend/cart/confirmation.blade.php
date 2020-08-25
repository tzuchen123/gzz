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
                            Seamlessly empower fully researched growth strategies and interoperable internal or
                            “organic” sources. Credibly innovate granular internal or “organic” sources whereas high
                            standards in web-readiness. Credibly innovate granular internal or organic sources whereas
                            high standards in web-readiness. Energistically scale future-proof core competencies
                            vis-a-vis impactful experiences. Dramatically synthesize integrated schemas. with optimal
                            networks.
                        </p>
                        <div class="card_area">
                            <h3>{{$product->price}}</h3>
                            <br>
                            <div class="product_count_area">
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" type="text" value="1" min="0"
                                        max="10">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <h5>個</h5>
                            </div>
                            
                            <div class="add_to_cart">
                                <a href="#" class="btn_3">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection