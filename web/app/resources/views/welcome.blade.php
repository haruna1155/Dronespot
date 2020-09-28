@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>新しい景色を見つけよう</h2>
    </div>
    <div class="main_visual d-flex justify-content-sm-around">
        <div>
            <a href="{!! route('posts.index') !!}" class="nav-link">
                <img src="img/dronespot_2.jpg" alt="見つける"></a>
            <p class="text-center">スポット一覧を見る</p>
        </div>

        <div>
            <a href="{!! route('posts.create') !!}" class="nav-link">
                <img src="img/dronespot_1.jpg" alt="共有する"></a>
            <p class="text-center">
                スポットを投稿しよう！<br>
                <small>新規会員登録は{!! link_to_route('signup.get', 'こちら') !!}</small>
            </p>
        </div>
    </div>

    <style>
        img {
            width: 100%;
            height: 100%;
        }
        a:hover {
            opacity: 0.6;
            transition-duration: 0.6s;
        }

        figcaption {
            text-align: center;
        }
    </style>

    <div class="mt-5 d-flex justify-content-sm-center">
        <h2>新着スポット</h2>
    </div>

    {{--post--}}
    @include('posts.posts')

    <div class="row mt-3 mb-4">
        <div class="d-flex justify-content-center btn-block">
            <div class="col-sm-5">
                {!! link_to_route('posts.index', 'スポットをもっと見る', [], ['class' => 'btn btn-success btn-block']) !!}
            </div>
        </div>
    </div>

@endsection
