@extends('template.master')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-10">
                @foreach($results as $result)
                <div>
                    <h3>{{$result->title}}</h3>
                    <div>
                        {{Str::limit(strip_tags($result->content),100)}}
                    </div>
                    <hr>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
