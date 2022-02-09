<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;
class CartController extends Controller
{
    //
    public function cartList(){
        $carts = Cart::all();
        return view('cart.list',compact('carts'));
    }
    public function addToCart(Request $request){
        $cart = new Cart;
        $cart->product_id = $request->product_id;
        $cart->user_id = Auth::id();

        $cart->save();
        return redirect()->back();
    }
}
