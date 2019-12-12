<?php


namespace App\Http\Controllers;
use App\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index()
    {
        $items = Products::all();
        return view('admin.products.index', compact('items'));

    }
    public function create()
    {
        return view('admin.products.create');

    }
    public function store(Request $request)
    {

        $requsetData = $request->all();

        //上傳檔案
        $file_name = $request->file('img')->store('','public');
        $requsetData['img'] = $file_name;

        Products::create($requsetData);

        return redirect('/admin/product');
    }

    public function edit($id)
    {
        $item = DB::table('products')->find($id);
        return view('admin.products.edit', compact('item'));

    }
    public function update(Request $request, $id)
    {
        // 方法三=>ORM集體法
        $item = Products::find($id);

    $requsetData = $request->all();
    if($request->hasFile('img')) {
        $old_image = $item->img;
        $file = $request->file('img');
        $path = $this->fileUpload($file,'product');
        $requsetData['img'] = $path;
        File::delete(public_path().$old_image);
    }

    $item->update($requsetData);

    return redirect('/admin/product');


    }

    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('/admin/products');
    }



    private function fileUpload($file,$dir){
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if( ! is_dir('upload/')){
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if ( ! is_dir('upload/'.$dir)) {
            mkdir('upload/'.$dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time()).'.'.$extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path().'/upload/'.$dir.'/'.$filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/'.$dir.'/'.$filename;
    }
}
