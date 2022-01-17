<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
use Str;
use App\Post;

class PostController extends Controller
{
    //
    function index(){
        // $posts = \App\Post::get();
        $posts = Post::orderBy('id','DESC')->get();
        return view('post.index',compact('posts'));
    }
    function create(){
        return view('post.create');
    }
    function store(Request $request){

        // 封面上傳
        // return $request->file('cover')->store('test');
        // return $request->file('cover')->store('test','public');
        if($request->file('cover')){
            $ext = $request->file('cover')->getClientOriginalExtension();
            $cover = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$cover,'public');
        }else{
            $cover = null;
        }


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
            'content' => $request->content,
            'cover' => $cover
        ]);

        // return redirect()->route('post.index');
        return Redirect::route('post.index');
    }
    function show(Post $post){
        // $post = Post::where('id',$id)->first();
        // $post = Post::find($id);
        // $post = Post::findOrFail($id);

        return view('post.show',compact('post'));
    }
    function edit(Post $post){
        return view('post.edit',compact('post'));
    }
    function update(Request $request, Post $post){
        // $post->fill($request->all());
        // $post->save();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return Redirect::route('post.show',['post' => $post->id]);
    }
    function destroy(Post $post){
        // $post = new Post;
        // $post->find($id)->delete();

        // $post->delete();


        Post::destroy($post->id);


        return Redirect::route('post.index');

    }
    public function removeCover(Request $request,Post $post){
        $post->cover = null;
        $post->save();

        return redirect()->back();
    }
}
