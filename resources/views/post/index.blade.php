@extends('template.master')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        @foreach($posts as $post)
        <div class="col-8">
            <h3>{{$post->title}}</h3>

            <div>
                分類:{{$post->category->title}}
            </div>
            <div>
                作者:{{$post->user->name}}
            </div>
            <div>
                @if($post->cover == null)
                <img src="{{asset('images/no-image.png')}}" class='w-100'>
                @else
                <img src="{{asset('images/'.$post->cover)}}" class='w-100'>
                @endif
            </div>
            <div>
                {!!Str::limit(strip_tags($post->content),200)!!}
            </div>
            <a href="{{route('post.show',['post' => $post->id])}}" class="btn btn-primary">繼續閱讀</a>
            <div>
                @php
                Carbon\Carbon::setLocale('zh_TW');
                @endphp
                {{-- 建立時間{{$post->created_at}} --}}
                建立時間 {{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
            </div>
            <div>
                最後更新時間 {{Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}
            </div>
            <hr>
        </div>
        @endforeach
    </div>
</div>
@endsection
