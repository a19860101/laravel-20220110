@extends('template.master')
@section('page-title')
{{$post->title}}
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h3>{{$post->title}}</h3>
            <div>
                {{$post->content}}
            </div>
            <div>
                建立時間{{$post->created_at}}
            </div>
            <div>
                最後更新時間{{$post->updated_at}}
            </div>
            <hr>
            <a href="{{route('post.edit',['post' => $post->id])}}" class="btn btn-primary">編輯文章</a>
            <form action="{{route('post.destroy',['post' => $post->id])}}" method="post" class="d-inline-block">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="刪除" onclick="return confirm('確認刪除？')">
            </form>
            <a href="{{route('post.index')}}" class="btn btn-success">文章列表</a>
        </div>

    </div>
</div>
@endsection
