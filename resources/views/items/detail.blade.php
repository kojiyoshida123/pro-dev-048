@extends('layouts.header')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center h5">
            <p>-- 作品詳細 --</p>
        </div>
    </div>
    <div class="container">
                <div class="center-block">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center">
                            ID: {{ $item->id }}
                        </div>
                            <a class="d-flex justify-content-center"><img src="data:image/jpeg;base64,<?= $file_name ?>" class="w-50 rounded border border-3 border border-dark" alt="image"></a>
                        <div class="d-flex justify-content-center">
                            < {{ $item->name}} >
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $item->body}}
                        </div>
                        <div class="d-flex justify-content-center">
                            作者名: {{ $item->type}}
                        </div>

                        <div class="d-flex justify-content-center">
                            登録日：{{ $item->created_at}}
                        </div>
                        <div class="d-flex justify-content-center pt-3">
                            @can('admin')
                            <a href="/moveToEdit/{{$item->id}}" class="btn btn-link" role="button"><i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  >>作品編集画面へ') }}</a>
                            @endcan
                            <a href="{{ route('item.index') }}" class="btn btn-link" role="button"><i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  >>作品一覧画面へ') }}</a>
                        </div>

                    </div>
                </div>
    </div>
</div>
@endsection