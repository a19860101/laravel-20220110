@extends('template.master')
@section('css')
    <style>
        .product-content {
            /* height: 400px; */
        }
    </style>
@endsection

@section('main')


<div class="container">
    <div class="row align-items-stretch g-3">
        @foreach ($products as $product)
        <div class="col-xl-3 col-md-4 col-6 product-item">
            <a href="{{route('product.detail',['product'=>$product->id])}}" class="text-dark text-decoration-none d-block border h-100 shadow-sm product-content">
                <div>
                    {{-- <img src="https://picsum.photos/id/45/800/600" class="w-100"> --}}
                    <img src="{{asset('images/'.$product->cover)}}" alt="" class="w-100">
                </div>
                <div class="p-3">
                    <h4>

                        {{$product->title}}

                    </h4>
                    <div>
                        @if($product->sale)
                        <del class="text-secondary">{{$product->price}}</del>
                        <div class="text-primary">特價 ${{$product->sale}}</div>
                        @else
                        售價 ${{$product->price}}
                        @endif
                        <form action="{{route('cart.addToCart')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="submit" value="加入購物車" class="btn btn-warning">
                        </form>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
