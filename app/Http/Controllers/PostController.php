<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Post;

class PostController extends Controller
{
    //
    function index(){
        // $posts = \App\Post::get();
        $posts = Post::get();
        return view('post.index',compact('posts'));
    }
    function create(){
        return view('post.create');
    }
}
