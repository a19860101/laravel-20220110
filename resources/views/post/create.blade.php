@extends('template.master')
@section('page-title')
建立文章
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h2>建立文章</h2>
        </div>
        <div class="col-8">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">標題</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">封面圖片</label>
                    <input type="file" name="cover">
                </div>
                <div class="mb-3">
                    <label for="">文章內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="submit" value="新增文章" class="btn btn-primary">
                <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('template.tinymce')
@endsection
