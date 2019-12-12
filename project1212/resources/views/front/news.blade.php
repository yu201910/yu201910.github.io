@extends('layouts.front_layout')
@section('css')
<style>
    .background_img {
        background-image: url("https://cdn.pixabay.com/photo/2019/11/20/07/08/lake-4639368_960_720.jpg");
        background-position: center;
        background-size: cover;
        height: 500px;
        margin-bottom: 50px;

    }

    .list-group-item a {
        display: block;
        width: 100%;

    }
</style>
@endsection
@section('content')

<div class="container">
    <div class="background_img">
    </div>

    <ul class="list-group">
        @foreach ($news as $new_single)
        <li class="list-group-item d-flex">
            <a href="/news/{{$new_single->id}}">
                <div class="date mr-5">2019-10-10</div>
                <div class="title">{{$new_single->title}}</div>
            </a>
        </li>

        @endforeach
    </ul>
    {{$news->links()}}
</div>
@endsection
