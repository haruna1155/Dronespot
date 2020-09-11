@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>新しい景色を見つけよう</h2>
    </div>
    
    <div class="main_visual d-flex justify-content-sm-around">
        <figure>
            <a href="#" class="nav-link"><img src="{{ asset('/img/dronespot_2.jpg') }}" alt="見つける"></a>
            <figcaption>スポット一覧へ</figcaption>
        </figure>
        <figure>
            <a href="#" class="nav-link"><img src="{{ asset('/img/dronespot_1.jpg') }}" alt="共有する"></a>
            <figcaption>
                マイページへ<br>
                <small>会員登録は<a href="#">こちら</a></small>
            </figcaption>
        </figure>
    </div>
    
    <div class="mt-5 d-flex justify-content-sm-center">
        <h2>新着スポット</h2>
    </div>
    
@endsection    
