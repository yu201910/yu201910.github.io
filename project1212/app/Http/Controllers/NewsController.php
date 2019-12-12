<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //
    public function index()
    {
        $items = DB::table('news')->get();
        return view('admin.news.index', compact('items'));

    }
    public function create()
    {
        return view('admin.news.create');

    }
    public function store(Request $request)
    {
        // 方法一=>DB法
        // $title = $request->title;
        // $sort = $request->sort;
        // DB::table('news')->insert(
        //     ['title' => $title, 'sort' => $sort]
        // );

        // return redirect('/admin/news');

        News::create($request->all());
        return redirect('/admin/news');

        // 方法二=>ORM個別法
        // $news = new News;
        // $news->title = $request->title;
        // $news->sort = $request->sort;
        // $news->save();
        // return redirect('/admin/news');

    }
    public function edit($id)
    {
        $item = DB::table('news')->find($id);
        return view('admin.news.edit', compact('item'));

    }
    public function update(Request $request, $id)
    {
        // 方法三=>ORM集體法
        $news = News::find($id);
        $news->update($request->all());
        return redirect('/admin/news');

        // 方法一=>DB法
        // $title = $request->title;
        // $sort = $request->sort;

        // DB::table('news')->where('id',$id)->update(
        //     ['title' => $title, 'sort' => $sort]
        // );
        // return redirect('/admin/news');

        // 方法二=>ORM個別法
        // $news = News::find($id);
        // $news->title = $request->title;
        // $news->sort = $request->sort;
        // $news->save();
    }

    public function destroy($id)
    {
        News::destroy($id);
        return redirect('/admin/news');
    }
}
