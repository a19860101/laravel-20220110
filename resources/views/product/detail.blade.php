@extends('template.master')
@section('css')

@endsection

@section('main')
<div class="container">
    <div class="row">
        <div class="col-6">
            <img src="{{asset('images/'.$product->cover)}}" class="w-100">
        </div>
        <div class="col-6 position-relative">
            <h4>{{$product->title}}</h4>
            <div class="position-absolute" style="bottom:100px">
                @if($product->sale)
                <del class="text-secondary">售價 ${{$product->price}}</del>
                <div class="text-primary">特價 ${{$product->sale}}</div>
                @else
                售價 ${{$product->price}}
                @endif
            </div>
        </div>
        <div class="col-12 mt-5 border p-0 border-dark rounded">
            <div class="p-3 bg-primary text-white">商品敘述</div>
            <div class="p-3">{{$product->description}}</div>
        </div>
    </div>
</div>
@endsection
