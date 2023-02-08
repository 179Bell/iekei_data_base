@extends('layouts.app')

@section('title', '店舗情報詳細')

@include('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('update_failed'))
            <div class="alert alert-danger text-center">
                {{ session('update_failed') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-10 border">
            <form action="{{ route('shop_info.update', ['id' => $shopInfo->id]) }}" method="post">
                @csrf
                <div class="my-2">
                    <label class="form-label" for="shop_name">店舗名</label>
                    <input class="form-control" type="text" name="shop_name" value={{ $shopInfo->shop_name }}>
                </div>
                <div class="my-2">
                    <label class="form-label" for="latitude">緯度</label>
                    <input class="form-control" type="text" name="latitude" value={{ $shopInfo->latitude }}>
                </div>
                <div class="my-2">
                    <label class="form-label" for="longitude">経度</label>
                    <input class="form-control" type="text" name="longitude" value={{ $shopInfo->longitude }}>
                </div>

                <div class="d-flex justify-content-center m-3">
                    <button type="submit" class="btn btn-primary mr-2">更新する</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">戻る</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
