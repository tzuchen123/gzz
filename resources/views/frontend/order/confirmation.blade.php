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
                            <h2>付款完成</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <section class="confirmation">
        <div class="container">
            <br><br><br><br>
            <div class="orderInfo">

            </div>
            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-dark btn-send">
                    回首頁
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button type="submit" class="btn btn-dark btn-send">
                    查詢訂單資料
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
</main>
@endsection