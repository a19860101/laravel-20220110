@extends('template.master')
@section('main')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-8 col-sm-10">
            <h2>編輯商品</h2>
            <hr>
            <form action="{{route('product.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">商品名稱</label>
                    <input type="text" name="title" class="form-control" value="{{$product->title}}">
                </div>
                <div class="mb-3">
                    @if($product->cover == null)
                    <label for="">封面圖片</label>
                    <input type="file" name="cover">
                    @else
                    <img src="{{asset('images/'.$product->cover)}}" width="200">
                    <form action="{{route('product.removeCover',['product'=>$product->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <input type="submit" value="刪除圖片" class="btn btn-danger">
                    </form>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">商品敘述</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">售價</label>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}">
                </div>
                <div class="mb-3">
                    <label for="">特價</label>
                    <input type="text" name="sale" class="form-control" value="{{$product->sale}}">
                </div>
                <div class="mb-3">
                    <label for="">上架日期</label>
                    <input type="date" name="up_date" class="form-control" value="{{$product->up_date}}">
                </div>
                <div class="mb-3">
                    <label for="">下架日期</label>
                    <input type="date" name="down_date" class="form-control" value="{{$product->down_date}}">
                </div>
                <input type="submit" value="儲存商品" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
