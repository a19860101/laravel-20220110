@extends('template.master')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('product.create')}}" class="btn btn-primary">新增商品</a>
        </div>
        <div class="col-12">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>商品名稱</th>
                    <th>售價</th>
                    <th>特價</th>
                    <th>上/下架</th>
                    <th>動作</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sale}}</td>
                    <td>
                        @if($product->up_date < today() && $product->down_date > today())
                        <span class="text-primary">已上架</span>
                        @else
                        <span class="text-danger">已下架</span>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-success">編輯商品資訊</a>
                        <form action="" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="刪除商品">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
