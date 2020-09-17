@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>新しい景色を見つけよう</h2>
    </div>
    <div class="main_visual d-flex justify-content-sm-around">
        <figure>
            <a href="#" class="nav-link"><img src="img/dronespot_2.jpg" alt="見つける"></a>
            <figcaption>スポット一覧へ</figcaption>
        </figure>

        <figure>
            <a href="#" class="nav-link"><img src="img/dronespot_1.jpg" alt="共有する"></a>
            <figcaption>
                マイページへ<br>
                <small>新規会員登録は<a href="#">こちら</a></small>　{{--リンクつける--}}
            </figcaption>
        </figure>
    </div>

    <div class="mt-5 d-flex justify-content-sm-center">
        <h2>新着スポット</h2>
    </div>

    {{--post--}}
    @include('posts.posts')

    <div class="row mt-3 mb-4">
        <div class="d-flex justify-content-center btn-block">
            <div class="col-sm-5">
                <a href='#' class="btn btn-success btn-block">スポットをもっと見る</a>
            </div>
        </div>
    </div>

@endsection
