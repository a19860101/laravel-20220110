@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>文章名稱</th>
                        <th>作者</th>
                        <th>建立時間</th>
                        <th>最後更新時間</th>
                        <th>動作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)

                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            @if($post->deleted_at)
                            <span class="text-decoration-line-through text-secondary">{{$post->title}}</span>
                            @else
                            <span>{{$post->title}}</span>
                            @endif
                        </td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">詳細內容</a>

                            @if ($post->deleted_at)
                            <a href="" class="btn btn-warning btn-sm">還原</a>
                            @else
                            <form action="" method="post" class="d-inline-block">
                                <input type="submit" class="btn btn-danger btn-sm" value="刪除">
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
