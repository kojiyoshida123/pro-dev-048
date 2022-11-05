@extends('layouts.header')

@section('content')
@include('common.user-navi')
<div class="container">
    <!-- マージンを上下に設定 -->
    <div class="my-5">
    </div>
    <hr>
    <h5 class="my-2">ユーザー一覧</h5>
    <table class="table table-borderd table-striped">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>権限</th>
            <th></th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>@if($user->role) 管理者 @else 一般 @endif</td>
            <td><a class="btn btn-link btn-sm" href="/edit/{{$user->id}}">>>編集画面へ</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection