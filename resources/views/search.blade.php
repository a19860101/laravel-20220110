@extends('template.master')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 border p-5 rounded">
            <h2>搜尋文章</h2>
            <form action="{{route('search.result')}}" method="get">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">關鍵字</label>
                    <input type="text" name="keyWord" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">日期</label>
                    <br>
                    <label for="">自</label>
                    <input type="date" name="started" class="form-control">
                    <label for="">至</label>
                    <input type="date" name="ended"class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" value="搜尋">
            </form>
        </div>
    </div>
</div>
@endsection
