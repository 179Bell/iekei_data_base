@extends('layouts.app')

@section('title', '管理画面トップ')

@include('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($shopInfos as $shopInfo)
                <div class="card mt-2">
                    <div class="card-body">
                        <h5>{{ $shopInfo->shop_name }}</h5>
                        <div class="d-flex flex-row justify-content-end">
                            <button onclick="location.href='{{ route('shop_info.detail', ['id' => $shopInfo->id]) }}'" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button>
                            <form action="{{ route('shop_info.delete', ['id' => $shopInfo->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
