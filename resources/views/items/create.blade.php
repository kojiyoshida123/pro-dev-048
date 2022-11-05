@extends('layouts.header')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center h5">
            <p>-- 作品登録画面 --</p>
        </div>
    </div>
    <form action="{{ route('item.store') }}" enctype='multipart/form-data' method="POST">
        @csrf
        <fieldset>
            <div class="col-lg-4 mx-auto">
                <div class="col-xs-2">
                    <div class="form-group">    
                        <label class="control-label" for="item_name">{{ __('作品名') }}</label>
                    </div>
                    <input type="text" class="form-control" name="item_name" id="item_name" value="{{ old('item_name') }}">
                </div>
                <div class="form-group">
                    <label for="item_image">{{ __('作品画像') }}</label>
                    <input type="file" class="form-control col-xs-2" name="item_image" id="item_image" value="">
                </div>
                <div class="form-group">
                    <label for="item_body">{{ __('作品紹介') }}</label>
                    <input type="text" class="form-control col-xs-2" name="item_body" id="item_body" value="{{ old('item_body') }}">
                </div>
                <div class="form-group">
                    <label for="item_type">{{ __('作者名') }}</label>
                    <input type="text" class="form-control col-xs-2" name="item_type" id="item_type" value="{{ old('item_type') }}">
                </div>

                <div class="d-flex justify-content-center pt-3">
                    <button type="submit" class="btn btn-success">{{ __('登録') }}</button>
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <!--/moveToEdit/{$item->id}-->
                    <a href="{{ route('item.index') }}" class="btn btn-link" role="button"><i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  >>作品一覧画面へ') }}</a>
                </div>
                <div class="my-3">
                    @include('common.errors')
                </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection