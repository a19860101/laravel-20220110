@extends('template.master')
@section('main')

<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-3">
            <h2>
                <a href="#" class="text-dark text-decoration-none">
                    {{$product->title}}
                </a>
            </h2>
            <div>
                @if($product->sale)
                <del class="text-secondary">{{$product->price}}</del>
                <div class="text-primary">特價 ${{$product->sale}}</div>
                @else
                售價 ${{$product->price}}
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
