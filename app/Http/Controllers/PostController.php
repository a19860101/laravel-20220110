<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use DB;
use Redirect;
use Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    //
    function index(){
        // $posts = \App\Post::get();
        $posts = Post::orderBy('id','DESC')->get();
        return view('post.index',compact('posts'));
    }
    function create(){
        $categories = Category::get();
        return view('post.create',compact('categories'));
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
            'cover' => $cover,
            'category_id' => $request->category_id
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
        $categories = Category::get();

        return view('post.edit',compact('post','categories'));
    }
    function update(Request $request, Post $post){
        // $post->fill($request->all());
        // $post->save();
        if($request->file('cover')){
            $ext = $request->file('cover')->getClientOriginalExtension();
            $cover = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$cover,'public');
        }else{
            $cover = null;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->cover = $cover;
        $post->category_id = $request->category_id;
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
        Storage::disk('public')->delete('images/'.$post->cover);

        $post->cover = null;
        $post->save();

        return redirect()->back();
    }
}
