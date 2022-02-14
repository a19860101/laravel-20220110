@extends('template.master')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 pb-3">
            <h1>購物車</h1>
            <div>
                {{count($carts) == 0 ? '目前沒有商品':'共有'.count($carts).'件商品'}}
            </div>

            <hr>
        </div>
        @foreach($carts as $cart)
        <div class="col-10 border border-dark mb-4 rounded">
            <div class="content p-3 d-flex align-items-center">
                <img src="{{asset('images/'.$cart->product->cover)}}" width="150">
                <div class="ms-3">{{$cart->product->title}}</div>
                <div class="ms-auto me-3">{{$cart->product->price}}</div>
                <form action="{{route('cart.deleteCart',['cart'=>$cart->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="移除" class="btn btn-danger btn-sm" onclick="return confirm('確認刪除？')">
                </form>

            </div>
        </div>
        @endforeach
        @if(count($carts) !=0)
        <div class="col-10">
            <form action="{{route('cart.removeCart')}}" method="post">
                @csrf
                <input type="submit" value="清空購物車" class="btn btn-danger btn-sm" onclick="return confirm('確認清空')">
            </form>
        </div>
        @endif
    </div>
</div>





@endsection
