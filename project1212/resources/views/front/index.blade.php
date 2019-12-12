@extends('layouts.front_layout')

@section('css')
<style>
    .banner_img {
        background-image: url("https://cdn.pixabay.com/photo/2019/12/03/21/59/arenfels-castle-4671199_960_720.jpg");
        background-position: center;
        background-size: cover;
        height: 500px;
    }

    .banner_img2 {
        background-image: url("https://cdn.pixabay.com/photo/2019/12/02/07/07/autumn-4667080_960_720.jpg");
        background-position: center;
        background-size: cover;
        height: 500px;
    }

    .banner_img3 {
        background-image: url("https://cdn.pixabay.com/photo/2015/09/09/16/05/forest-931706_960_720.jpg");
        background-position: center;
        background-size: cover;
        height: 500px;
    }

    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }


    .swiper-container {
        width: 100%;
        height: 100%;
    }


    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* Center slide text vertically */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    h2{
        line-height: 70px;

    }
</style>
@endsection
{{-- Banner --}}
@section('content')
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active banner_img">
                <img src="..." class="d-block w-100" alt="">
            </div>
            <div class="carousel-item banner_img2">
                <img src="..." class="d-block w-100" alt="">
            </div>
            <div class="carousel-item banner_img3">
                <img src="..." class="d-block w-100" alt="">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Swiper -->
    <div><h2>Products</h2></div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
         @foreach ($items as $item)
            <div class="swiper-slide">
            <a href="/products/{{$item->id}}">
                <div class="card ">
                    <img src="{{$item->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                    </div>
                </div>
            </a>
            </div>
        @endforeach

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

{{-- product --}}
<div><h2>News</h2></div>
    <ul class="list-group">
            @foreach ($news as $new )
                <li class="list-group-item d-flex">
                    <a href="/news/{{$new->id}}">
                    <div class="date mr-5">{{$new->created_at}}</div>
                    <div class="title">{{$new->title}}</div>
                    </a>
                </li>

        @endforeach
    </ul>
</div>
@endsection

@section('js')
<script>
    var swiper = new Swiper('.swiper-container', {
          slidesPerView: 3,
          spaceBetween: 30,
          slidesPerGroup: 3,
          loop: true,
          loopFillGroupWithBlank: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });
</script>
@endsection
