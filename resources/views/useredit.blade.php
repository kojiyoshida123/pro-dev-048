@extends('layouts.header')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center h5">
            <p>ユーザー編集画面</p>
        </div>
    </div>
        <form action="{{ route('userEdit') }}" method="POST">
            @csrf
            <fieldset>
                <div class="col-lg-4 mx-auto">
                    <label class="col-sm-4 control-label text-danger" for="user_id">{{ __('ID ※入力不可') }}</label>
                    <input type="text" class="form-control text-danger" name="edit_id" id="user_id" value="{{$user->id}}" readonly>
                </div>
                <div class="col-lg-4 mx-auto">
                    <label class="col-sm-2 control-label" for="user_name">{{ __('NAME') }}</label>
                    <input type="text" class="form-control" name="edit_name" id="user_name" value="{{$user->name}}">
                </div>
                <div class="col-lg-4 mx-auto">
                    <label for="user_email">{{ __('EMAIL') }}</label>
                    <input type="email" class="form-control" name="edit_email" id="user_email" value="{{$user->email}}">
                </div>
                <div>
                    <div class="">
                        <div class="me-auto my-3 d-flex justify-content-center">
                            <div class="">
                                <label class="p-3"><input type="radio" name="edit_role" value="0">一般権限</label>
                            </div>
                            <div>
                                <label class="p-3"><input type="radio" name="edit_role" value="1">管理権限</label>
                            </div>
                        </div>
                        <div class="me-auto my-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success ml-1">{{ __('変更') }}</button>
                        </div>
                        <div class="me-auto my-3 d-flex justify-content-center">
                        <a href="/userDelete/{{$user->id}}"><button type="button" class="btn btn-danger text-white ml-3">削除</button></a>
                        </div>
                        <div class="me-auto my-3 d-flex justify-content-center">
                            <a href="{{ route('user.list') }}" class="btn btn-link" role="button">
                                <i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  >> 一覧画面へ') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="my-3 col-lg-4 mx-auto">
                    @include('common.errors')
                </div>
            </fieldset>
        </form>
    
</div>
@endsection
