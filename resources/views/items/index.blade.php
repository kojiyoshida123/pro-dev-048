@extends('layouts.header')

@section('content')
@include('common.item-navi')
<div class="container">
    <!-- マージンを上下に設定 -->
    <div class="my-5">
    </div>
    <hr>
    <h5 class="my-2">-- 作品一覧 --</h5>
    <table class="table table-borderd table-striped">
        <tr>
            <th>ID</th>
            <th>作品名</th>
            <th>作品紹介</th>
            <th>作者名</th>
            <th>更新日</th>
            <th></th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->body}}</td>
            <td>{{$item->type}}</td>
            <td>{{$item->updated_at}}</td>
            <td><a class="btn btn-link btn-sm" href="/detail/{{$item->id}}">>>詳細画面へ</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection