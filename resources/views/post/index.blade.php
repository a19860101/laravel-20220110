@extends('template.master')

@section('main')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
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
            <a href="{{route('post.show',['post' => $post->id])}}" class="btn btn-primary">繼續閱讀</a>
            <hr>
        </div>
        @endforeach
    </div>
</div>
@endsection
