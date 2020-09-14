@extends('layouts.frontend')

@section('content')
<main>

    <!-- slider Area Start -->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            @foreach ($banners as $banner)
            <div class="single-slider slider-height d-flex align-items-center justify-content-center"
                data-background="{{$banner->image}}">
                <h1 style="color: white">{{$banner->title}}</h1>
            </div>
            @endforeach
        </div>
    </div>
    <!-- slider Area End-->


    <!-- Category Area Start-->
    <section class="category-area section-padding30">
        <div class="container-fluid">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-85">
                        <h2>Shop by Category</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($sorts as $sort)
                <a href="{{ route('frontend.product.index',[$sort->id]) }}">
                    <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img">
                                <img src="{{$sort->image}}" alt="" style="height:250px;">
                                <div class="category-caption">
                                    <h2>{{$sort->title}}</h2>
                                    <span class="best"><a href="#">{{$sort->subtitle}}</a></span>
                                    <span class="collection">{{$sort->solgan}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                @endforeach

                {{-- <div class="col-xl-4 col-lg-6">
                    <div class="single-category mb-30">
                        <div class="category-img text-center">
                            <img src="/frontend/assets/img/categori/cat2.jpg" alt="">
                            <div class="category-caption">
                                <span class="collection">Discount!</span>
                                <h2>Winter Cloth</h2>
                                <p>New Collection</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="single-category mb-30">
                        <div class="category-img">
                            <img src="/frontend/assets/img/categori/cat3.jpg" alt="">
                            <div class="category-caption">
                                <h2>Man`s Cloth</h2>
                                <span class="best"><a href="#">Best New Deals</a></span>
                                <span class="collection">New Collection</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Category Area End-->
    <!-- Latest Products Start -->
    <section class="latest-product-area padding-bottom">
        <div class="container">
            <div class="row product-btn d-flex justify-content-end align-items-end">
                <!-- Section Tittle -->
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="section-tittle mb-30">
                        <h2>Hot Products</h2>
                    </div>
                </div>

            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">

                        @foreach ($hotProducts as $product)

                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <a href="{{ route('frontend.product.detail',[$product->id]) }}">
                                <div class="single-product">
                                    <div class="product-img" style="">
                                        <img src="{{$product->image}}" alt="">
                                        
                                        {{-- faker --}}
                                        <img src="/storage/uploads/images/product/{{$product->image}}">
                                    </div>
                                    <div class="product-caption">
                                        <h4 style="color: black;">{{$product->title}}</h4>
                                        <p> {{$product->price}}元</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @endforeach

                    </div>
                </div>

            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Latest Products End -->


    <!-- Latest Offers Start -->
    <div class="latest-wrapper lf-padding">
        <div class="latest-area latest-height d-flex align-items-center"
            data-background="/frontend/assets/img/collection/latest-offer.png">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
                        <div class="latest-caption">
                            <h2>Get Our<br>Latest Offers News</h2>
                            <p>Subscribe news latter</p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-6 ">
                        <div class="latest-subscribe">
                            <form action="#">
                                <input type="email" placeholder="Your email here">
                                <button>Subscribe Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- man Shape -->
            <div class="man-shape">
                <img src="/frontend/assets/img/collection/latest-man.png" alt="">
            </div>
        </div>
    </div>
    <!-- Latest Offers End -->

</main>
@endsection