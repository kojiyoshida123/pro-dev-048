@extends('layouts.header')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center h5">
            <p>-- 作品編集画面 --</p>
        </div>
    </div>
    <form action="{{ route('itemEdit') }}" enctype='multipart/form-data' method="POST">
        @csrf
        <fieldset>
            <div class="col-lg-4 mx-auto">
                <div class="col-xs-2">
                <div class="form-group">
                    <label class="col-sm-4 control-label text-danger" for="item_edit_id">{{ __('ID ※入力不可') }}</label>
                    <input type="text" class="form-control text-danger" name="item_edit_id" id="item_edit_id" value="{{$item->id}}" readonly>
                </div>
                    <div class="form-group">    
                        <label class="control-label" for="item_edit_name">{{ __('作品名') }}</label>
                    </div>
                    <input type="text" class="form-control" name="item_edit_name" id="item_edit_name" value="{{$item->name}}">
                </div>
                <div class="form-group">
                    <label for="item_edit_image">{{ __('作品画像') }}</label>
                    <input type="file" class="form-control col-xs-2" name="item_edit_image" id="item_edit_image" value="">
                </div>
                <div class="form-group">
                    <label for="item_edit_body">{{ __('作品紹介') }}</label>
                    <input type="text" class="form-control col-xs-2" name="item_edit_body" id="item_edit_body" value="{{$item->body}}">
                </div>
                <div class="form-group">
                    <label for="item_edit_type">{{ __('作者名') }}</label>
                    <input type="text" class="form-control col-xs-2" name="item_edit_type" id="item_edit_type" value="{{$item->type}}">
                </div>

                <div class="d-flex justify-content-center pt-3">
                    <button type="submit" class="btn btn-success">{{ __('更新') }}</button>
                </div>
                <div class="me-auto my-3 d-flex justify-content-center">
                    <a href="/itemDelete/{{$item->id}}"><button type="button" class="btn btn-danger text-white ml-3">削除</button></a>
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <a href="/detail/{{$item->id}}" class="btn btn-link" role="button"><i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  >>作品詳細画面へ') }}</a>
                </div>
                <div class="my-3">
                    @include('common.errors')
                </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection