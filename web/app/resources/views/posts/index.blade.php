@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>スポットを見つける</h2>
    </div>

    <div class="dropdown mt-3">
        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
            地方別検索
        </button>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">北海道地方</a>
            <a class="dropdown-item" href="#">東北地方</a>
            <a class="dropdown-item" href="#">関東地方</a>
            <a class="dropdown-item" href="#">中部地方</a>
            <a class="dropdown-item" href="#">近畿地方</a>
            <a class="dropdown-item" href="#">中国地方</a>
            <a class="dropdown-item" href="#">四国地方</a>
            <a class="dropdown-item" href="#">九州地方</a>
            <a class="dropdown-item" href="#">沖縄地方</a>
        </div>
    </div>

    {{-- 投稿一覧 --}}
            @include('posts.posts', ['size' => 'lg'])
            {{ $posts->links() }}

@endsection
