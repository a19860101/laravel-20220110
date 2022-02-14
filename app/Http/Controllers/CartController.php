<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;
use DB;
class CartController extends Controller
{
    //
    public function cartList(){
        $carts = Cart::where('user_id',Auth::id())->get();
        $price = [];
        foreach($carts as $cart){
            if($cart->product->sale){
                $price[] = $cart->product->sale;
            }else{
                $price[] = $cart->product->price;
            }
        }
        $total = collect($price)->sum();
        // return $price;
        return view('cart.list',compact('carts','total'));
    }
    public function addToCart(Request $request){
        $cart = new Cart;
        $cart->product_id = $request->product_id;
        $cart->user_id = Auth::id();

        $cart->save();
        return redirect()->back();
    }
    public function deleteCart(Cart $cart){
        $cart->delete();
        return redirect()->back();
    }
    public function removeCart(Cart $cart){
        $carts = Cart::where('user_id',Auth::id())->get();
        foreach($carts as $cart){
            DB::table('carts')->where('id',$cart->id)->delete();
        }
        return redirect()->back();
    }
}
