@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>分類管理</h2>
            <hr>
        </div>
        <div class="col-6">
            <h3>建立分類</h3>
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">分類標題</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">分類英文標題</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <input type="submit" value="建立分類" class="btn btn-primary">
            </form>
        </div>
        <div class="col-6">
            <h3>分類列表</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    分類
                </li>
                <li class="list-group-item">
                    分類
                </li>
                <li class="list-group-item">
                    分類
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
