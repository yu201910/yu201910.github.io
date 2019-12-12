
@extends('layouts.front_layout')

@section('css')
<style>
    .main_content{
       margin-top:30px ;

    }
</style>
@endsection


@section('content')
<div class="container main_content">
    <div class="row">
        <div class="col-12 col-md-6">
            <img src="{{$product_single->img}}" alt="">
        </div>
        <div class="col-12 col-md-6">
                <h1>{{$product_single ->title }}</h1>
                <p>{{$product_single ->id }}</p>
        </div>
    </div>

</div>
@endsection

@section('js')

@endsection
