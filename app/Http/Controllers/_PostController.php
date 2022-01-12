<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    //
    function index(){
        // $posts = DB::select('SELECT * FROM posts');
        $posts = DB::table('posts')->get();
        return view('post.index')->with(['posts' => $posts]);
    }
    function show($id){
        // $posts = DB::select('SELECT * FROM posts WHERE id = ?',[$id]);
        // $posts = DB::table('posts')->where('id',$id)->get();

        // $post = DB::table('posts')->where('id',$id)->first();
        $post = DB::table('posts')->find($id);

        return view('post.show',compact('post'));
    }
    function create(){
        return view('post.create');
    }
    function store(Request $request){
        // DB::insert('INSERT INTO posts(title,content,created_at,updated_at)VALUES(?,?,?,?)',[
        //     request()->title,
        //     request()->content,
        //     now(),
        //     now()
        // ]);
        DB::table('posts')->insert([
            'title'     =>request()->title,
            'content'   =>request()->content,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        return redirect('post');
    }
    function edit($id){
        $post = DB::table('posts')->find($id);
        return view('post.edit',compact('post'));
    }
    function update(Request $request, $id){
        DB::update('UPDATE posts SET title=?,content=?,updated_at=? WHERE id =?',[
            $request->title,
            $request->content,
            now(),
            $id
        ]);
        return redirect('post/'.$id);
    }
    function destroy($id){
        // DB::delete('DELETE FROM posts WHERE id = ?',[$id]);
        DB::table('posts')->where('id',$id)->delete();
        return redirect('post');
    }
}
