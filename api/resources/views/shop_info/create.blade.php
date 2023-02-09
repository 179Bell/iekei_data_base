@extends('layouts.app')

@section('title', '店舗情報登録')

@include('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
            <form action="{{ route('shop_info.create') }}" method="post">
                @csrf
                <div class="my-2">
                    <label class="form-label" for="shop_name">店舗名</label>
                    <input class="form-control" type="text" name="shop_name" placeholder="店舗名を入力">
                </div>
                <div class="my-2">
                    <label class="form-label" for="latitude">緯度・経度</label>
                    <input class="form-control" type="text" name="latlong" value="googlemapの緯度経度を入力">
                </div>
                <div class="my-2">
                    <label class="form-label" for="prefecture">都道府県</label>
                    <input class="form-control" type="text" name="prefecture" placeholder="都道府県を入力">
                </div>
                <div class="my-2">
                    <label class="form-label" for="city_name">市区町村</label>
                    <input class="form-control" type="text" name="city_name" placeholder="市町村を入力">
                </div>
                <div class="my-2">
                    <label class="form-label" for="address">番地など</label>
                    <input class="form-control" type="text" name="address" placeholder="番地などを入力">
                </div>

                <div class="d-flex justify-content-center m-3">
                    <button type="submit" class="btn btn-primary">登録する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
