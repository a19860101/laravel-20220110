<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use DB;
use Redirect;
use Str;
use Auth;
use App\Post;
use App\Category;
use App\Tag;

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

        // 表單驗證
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

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
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();

        // 方法四

        // Post::create($request->all());

        // 方法五

        // Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'cover' => $cover,
        //     'category_id' => $request->category_id,
        //     'user_id' => Auth::id()
        // ]);

        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagData = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagData -> id);
        }

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

        //標籤
        $post->tags()->detach();
        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagData = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagData -> id);
        }

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

    public function upload(){
        $ext = request()->file('file')->getClientOriginalExtension();
        $img = Str::uuid().'.'.$ext;
        request()->file('file')->storeAs('images',$img,'public');

        return response()->json(['location' => '/images/'.$img]);
    }
    public function list(){
        $posts = Post::withTrashed()->orderBy('id','DESC')->get();
        return view('post.list',compact('posts'));
    }
    public function postRestore($id){
        return $id;
    }
}
