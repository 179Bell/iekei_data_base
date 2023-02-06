@section('header')
<header>
    <nav class="navbar">
        <div class="container-fluid">
            <a href="{{ route('dashboard') }}"
                class="navbar-brand">イケケイタベタイ管理画面</a>
            <div class="navbar-nav ms-auto d-flex flex-row">
                <button onclick="location.href='{{ route('shop_info.create') }}'"
                    class="btn btn-primary px-3 me-2">新規作成</button>
                <button onclick="location.href='{{ route('logout') }}'"
                class="btn btn-success px-3 me-2">ログアウト</button>
            </div>
        </div>
    </nav>
</header>
@endsection
