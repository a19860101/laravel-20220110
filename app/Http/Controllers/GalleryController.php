<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class GalleryController extends Controller
{
    //
    public function index(){
        // $galleries = Storage::disk('public')->files('images');
        $galleries = Storage::disk('public')->files('images');
        // foreach($galleries as $g){
        //     echo $g;
        // }
        // return $galleries;
        // dd($galleries);
        // dd(response($galleries));
        // dd(response(collect($galleries)));
        return response(collect($galleries));
    }
}
