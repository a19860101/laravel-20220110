@extends('template.master')
@section('page-title')
{{$post->title}}
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h3>{{$post->title}}</h3>
            <div>
                分類:{{$post->category->title}}
            </div>
            <div>
                作者:{{$post->user->name}}
            </div>
            <div>
                {!!$post->content!!}
            </div>
            <div>
                建立時間{{$post->created_at}}
            </div>
            <div>
                最後更新時間{{$post->updated_at}}
            </div>
            <hr>
            @if(Auth::id() == $post->user_id)
            <a href="{{route('post.edit',['post' => $post->id])}}" class="btn btn-primary">編輯文章</a>
            <form action="{{route('post.destroy',['post' => $post->id])}}" method="post" class="d-inline-block">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="刪除" onclick="return confirm('確認刪除？')">
            </form>
            @endif
            <a href="{{route('post.index')}}" class="btn btn-success">文章列表</a>
        </div>

    </div>
</div>
@endsection
