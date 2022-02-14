<h1>購物車</h1>
@foreach($carts as $cart)
{{-- <div>{{$cart->product_id}}</div> --}}
<div>{{$cart->product->title}}</div>
@endforeach
