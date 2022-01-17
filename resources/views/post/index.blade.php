@extends('template.master')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        @foreach($posts as $post)
        <div class="col-8">
            <h3>{{$post->title}}</h3>
            <div>
                {!!Str::limit($post->content,200)!!}
            </div>
            <a href="{{route('post.show',['post' => $post->id])}}" class="btn btn-primary">繼續閱讀</a>
            <div>
                建立時間{{$post->created_at}}
            </div>
            <div>
                最後更新時間{{$post->updated_at}}
            </div>
            <hr>
        </div>
        @endforeach
    </div>
</div>
@endsection
