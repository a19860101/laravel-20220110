<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
    // return view('index');
});
Route::get('/about',function(){
    return view('about');
});

Route::get('/post','PostController@index')->name('post.index');
Route::get('/post/create','PostController@create')->name('post.create')->middleware('auth');
Route::post('/post','PostController@store')->name('post.store')->middleware('auth');
Route::get('/post/{post}','PostController@show')->name('post.show');
Route::get('/post/{post}/edit' ,'PostController@edit')->name('post.edit')->middleware('auth');
Route::put('/post/{post}','PostController@update')->name('post.update')->middleware('auth');
Route::delete('/post/{post}','PostController@destroy')->name('post.destroy')->middleware('auth');
//delete,put/patch

//文章管理
Route::get('/admin/post','PostController@list')->name('post.list')->middleware('auth');
//文章還原
Route::get('admin/postRestore/{id}','PostController@postRestore')->name('post.restore')->middleware('auth');
//清空文章
Route::delete('admin/postForceDelete','PostController@postForceDelete')->name('post.forceDelete')->middleware('auth');

Route::patch('post/{post}','PostController@removeCover')->name('post.removeCover');

Route::post('/upload','PostController@upload')->name('upload');

Route::resource('category','CategoryController');

Route::get('test',function(){
    // $data = Storage::disk('public')->files('images');
    // return $data;
    return view('test');
});

Route::get('gallery','GalleryController@index')->name('gallery.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// 搜尋

Route::get('/search','SearchController@index')->name('search');
Route::get('/search/result','SearchController@searchResult')->name('search.result');

//商品

Route::resource('admin/product','ProductController');
Route::get('product','ProductController@list');
