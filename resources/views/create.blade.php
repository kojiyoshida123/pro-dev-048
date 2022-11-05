@extends('layouts.header')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center h4">
            <p>作品管理システム</p>
        </div>
        <div class="d-flex justify-content-center h5">
            <p>新規ユーザー登録画面</p>
        </div>
    </div>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <fieldset>
            <div class="col-lg-4 mx-auto">
                <div class="col-xs-2">
                    <div class="form-group">    
                        <label class="control-label" for="user_name">{{ __('name') }}</label>
                    </div>
                    <input type="text" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}">
                </div>
                <div class="form-group">
                    <label for="user_email">{{ __('email') }}</label>
                    <input type="email" class="form-control col-xs-2" name="user_email" id="user_email" value="{{ old('user_email') }}">
                </div>
                <div class="form-group">
                    <label for="user_password">{{ __('password') }}</label>
                    <input type="password" class="form-control col-xs-2" name="user_password" id="user_password" value="">
                </div>
                <div class="form-group">
                    <label for="user_password_confirmation">{{ __('password:確認用') }}</label>
                    <input type="password" class="form-control col-xs-2" name="user_password_confirmation" id="user_password_confirmation" value="">
                </div>

                <div class="d-flex justify-content-center pt-3">
                    <button type="submit" class="btn btn-success">{{ __('登録') }}</button>
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <a href="{{ route('user.login') }}" class="btn btn-link" role="button"><i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  >>ログイン画面へ') }}</a>
                </div>
                <div class="my-3">
                    @include('common.errors')
                </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection