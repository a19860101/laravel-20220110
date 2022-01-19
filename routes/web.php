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
Route::get('/post/create','PostController@create')->name('post.create');
Route::post('/post','PostController@store')->name('post.store');
Route::get('/post/{post}','PostController@show')->name('post.show');
Route::get('/post/{post}/edit' ,'PostController@edit')->name('post.edit');
Route::put('/post/{post}','PostController@update')->name('post.update');
Route::delete('/post/{post}','PostController@destroy')->name('post.destroy');
//delete,put/patch

Route::patch('post/{post}','PostController@removeCover')->name('post.removeCover');

Route::resource('category','CategoryController');

Route::get('test',function(){
    // $data = Storage::disk('public')->files('images');
    // return $data;
    return view('test');
});

Route::get('gallery','GalleryController@index')->name('gallery.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
