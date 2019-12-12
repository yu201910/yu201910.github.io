<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //

    public function index()
    {
        $items = DB::table('products')->get();
        $news = DB::table('news')->where('id','<=','3')->get();

        return view('front.index', compact('items', 'news'));
    }


    public function news()
    {
        $news = DB::table('news')->simplePaginate(10);

        return view('front.news', compact('news'));
    }
    public function news_detail($id)
    {
        $news_single = DB::table('news')->where('id', $id)->first();

        return view('front.news_detail', compact('news_single'));
    }

    //
    public function products()
    {
        $photos = DB::table('products')->get();

        return view('front.products', compact('photos'));
    }

    // public function product_detail($id)
    // {
    //     $product_single = DB::table('products')->find($id);

    //     return view('front.product_detail', compact('product_single'));
    // }
    public function product_detail($id)
    {
        $product_single = DB::table('products')->where('id', $id)->first();

        return view('front.product_detail', compact('product_single'));
    }
}














