@extends('layouts.front_layout')
@section('css')
        <style>
        .background_img{
            background-image: url("https://cdn.pixabay.com/photo/2016/08/11/23/48/italy-1587287_960_720.jpg");
            background-position: center;
            background-size: cover;
            height:500px;
        }
        .card{
            margin:30px 0;
            overflow: hidden;
        }
        .card img{
            transition: 0.5s;

        }
        .card img:hover{
            transform: scale(1.05);
            background-color: white;
            opacity: 0.5;

        }
        </style>
@endsection



@section('content')

<div class="container">
            <div class="background_img">
            </div>
                <div class="row">
                    @foreach ($photos as $photo)
                    <div class="col-12 col-md-4 ">
                    <a href="/products/{{$photo ->id}}">
                        <div class="card ">
                                <img src="{{$photo ->img  }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">{{  $photo ->title }}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/products/{{$photo ->id}}" class="btn btn-primary">Go somewhere</a>
                                </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
                </div>
</div>
@endsection


