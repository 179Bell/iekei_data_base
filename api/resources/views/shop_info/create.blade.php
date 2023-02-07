@extends('layouts.app')

@section('title', '店舗情報登録')

@include('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 border">
            <form action="{{ route('shop_info.create') }}" method="post">
                @csrf
                <div class="my-2">
                    <label class="form-label" for="shop_name">店舗名</label>
                    <input class="form-control" type="text" name="shop_name" placeholder="店舗名を入力">
                </div>
                <div class="my-2">
                    <label class="form-label" for="latitude">緯度</label>
                    <input class="form-control" type="text" name="latitude" placeholder="緯度を入力">
                </div>
                <div class="my-2">
                    <label class="form-label" for="longitude">経度</label>
                    <input class="form-control" type="text" name="longitude" placeholder="経度を入力">
                </div>

                <div class="d-flex justify-content-center m-3">
                    <button type="submit" class="btn btn-primary">登録する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
