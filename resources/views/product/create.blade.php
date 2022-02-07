@extends('template.master')
@section('main')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-8 col-sm-10">
            <h2>新增商品</h2>
            <hr>
            <form action="">
                <div class="mb-3">
                    <label for="">商品名稱</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">商品敘述</label>
                    <textarea name="decription" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">售價</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">特價</label>
                    <input type="text" name="sale" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">上架日期</label>
                    <input type="date" name="up_date" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">下架日期</label>
                    <input type="date" name="down_date" class="form-control">
                </div>
                <input type="submit" value="新增商品" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
