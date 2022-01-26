<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    //
    public function index(){
        return view('search');
    }
    public function searchResult(Request $request){
        $results = DB::table('posts')
                    ->where('title','LIKE','%'.$request->keyWord.'%')
                    ->get();

        return view('searchList',compact('results'));
    }
}
