<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', 'FrontController@index');

Route::get('/news', 'FrontController@news');
Route::get('/news/{id}', 'FrontController@news_detail');

Route::get('/products', 'FrontController@products');
Route::get('/products/{id}', 'FrontController@product_detail');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();





// Route::middleware(['auth'])->group(function () {
//     Route::get('/', function () {
//         // 使用 auth 中间件

//     });
//     Route::get('/news', function () {
//         // 使用 auth 中间件
//     });
//     Route::get('/products', function () {
//         // 使用 auth 中间件
//     });
// });


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/', 'adminController@index'
    );

Route::get('products', 'ProductsController@index');  //----------------> 列出所有產品的頁面
Route::get('products/create', 'ProductsController@create'); //---------> 到建立產品的頁面
Route::post('products/store', 'ProductsController@store'); //----------> "儲存"產品資料
Route::get('products/edit/{id}', 'ProductsController@edit'); //--------> 到特定產品的頁面
Route::post('products/update/{id}', 'ProductsController@update'); //---> "更新"產品資料
Route::post('products/destroy/{id}', 'ProductsController@destroy'); //---> "刪除"產品資料


Route::get('news', 'NewsController@index');
Route::get('news/create', 'NewsController@create');
Route::post('news/store', 'NewsController@store');
Route::get('news/edit/{id}', 'NewsController@edit');
Route::post('news/update/{id}', 'NewsController@update');
Route::post('news/destroy/{id}', 'NewsController@destroy');

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
