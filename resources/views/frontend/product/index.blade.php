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
                            <h2>Product Catagori</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Latest Products Start -->
    <section class="latest-product-area latest-padding">
        <div class="container">

            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <a href="{{route('frontend.product.detail',[$product->id])}}">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        {{-- faker --}}
                                        <img src="/storage/uploads/images/product/{{$product->image}}">

                                        <img src="{{$product->image}}" alt="">
                                        @if ($product->hot == '1')
                                        <div class="new-product">
                                            <span>hot</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-caption">
                                        <h4><a href="#">{{$product->title}}</a></h4>
                                        <div class="price">
                                            <ul>
                                                <li>{{$product->price}}元</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


</main>
@endsection