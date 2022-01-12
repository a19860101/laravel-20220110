<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
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
    function store(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        // return redirect()->route('post.index');
        return Redirect::route('post.index');
    }
}
