@extends('template.master')
@section('page-title')
編輯文章
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h2>編輯文章</h2>
        </div>
        <div class="col-8">
            <form action="{{route('post.update',['post'=>$post->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">標題</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">分類</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categories as $category)
                        <option
                            value="{{$category->id}}"
                            {{$post->category_id == $category->id ? 'selected':''}}
                            >{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    @if($post->cover == null)
                    <label for="">封面圖片</label>
                    <input type="file" name="cover">
                    @else
                    <img src="{{asset('images/'.$post->cover)}}" width="200">
                    <form action="{{route('post.removeCover',['post'=>$post->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <input type="submit" value="刪除圖片" class="btn btn-danger">
                    </form>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">文章內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                </div>
                <input type="submit" value="儲存" class="btn btn-primary">
                <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('template.tinymce')
@endsection
