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
        // 方法一
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        // 方法二 (最不推薦)
        // $post = new Post;
        // $post->fill([
        //     'title' => $request->title,
        //     'content' => $request->content
        // ]);
        // $post->save();

        // 方法三
        // $post = new Post;
        // $post->fill($request->all());
        // $post->save();

        // 方法四

        // Post::create($request->all());

        // 方法五

        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        // return redirect()->route('post.index');
        return Redirect::route('post.index');
    }
    function show($id){
        // $post = Post::where('id',$id)->first();
        // $post = Post::find($id);
        $post = Post::findOrFail($id);

        return view('post.show',compact('post'));
    }
}
