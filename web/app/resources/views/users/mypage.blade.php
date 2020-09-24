@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>{{ $user->name }}のマイページ</h2>
    </div>

<div class = "wrapper">
    <div class="sidenav mt-2 mb-4">
        <figure>
            <a href="{!! route('posts.create') !!}" class="nav-link">
                <img src="img/dronespot_3.jpg" alt="新規投稿">
            </a>
        </figure>
        <figure>
            <a href="{!! route('posts.index') !!}" class="nav-link">
                <img src="img/dronespot_4.jpg" alt="投稿一覧">
            </a>
        </figure>

    </div>


    {{--<div class="d-flex justify-content-center btn-block">
        <div class="col-sm-6">
            {!! link_to_route('posts.create', 'スポットを共有しよう', [], ['class' => "btn btn-info btn-block btn-lg"]) !!}
        </div>
    </div> --}}

    <br>
    <br>

    <ul class="nav nav-tabs nav-justified mb-3">
        <li class="nav-item">
            <a href="{{route('users.mypage')}}" class="nav-link {{Request::routeIs('users.mypage') ? 'active' : '' }}" >
                スポット
            </a>
        </li>
        <li class="nav-item"><a href="#" class="nav-link">お気に入り</a></li>
    </ul>

    @include('posts.posts')

</div>
    <style>
        .wrapper {
            display: flex;
            width:100%;
        }
        .sidenav {
            width:30%;
        }
        img {
            width: 100%;
            height: 100%;
        }
        a:hover {
            opacity: 0.6;
            transition-duration: 0.6s;
        }
        ul {
            width: 70%;

        }

    </style>


@endsection
