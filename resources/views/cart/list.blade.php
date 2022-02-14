@extends('template.master')

@section('main')
<h1>購物車</h1>
<div class="container">
    <div class="row justify-content-center">
        @foreach($carts as $cart)
        <div class="col-10 border border-dark mb-4 rounded">
            <div class="content p-3 d-flex align-items-center">
                <img src="{{asset('images/'.$cart->product->cover)}}" width="150">
                <div class="ms-3">{{$cart->product->title}}</div>
                <div class="ms-auto">{{$cart->product->price}}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>





@endsection
