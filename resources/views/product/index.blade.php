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
                    <th>商品價格</th>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
