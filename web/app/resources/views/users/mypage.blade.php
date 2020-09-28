@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>{{ $user->name }}のマイページ</h2>
    </div>

    <div class="row col-3" style="float: left;">
        <div class="mt-2 mb-4 mr-2 ml-0">
            <a href="{!! route('posts.create') !!}" class="side">
                <img src="img/dronespot_3.jpg" alt="新規投稿"  style="max-width: 100%;">
            </a>
        </div>
        <div class="mt-2 mb-4">
            <a href="{!! route('posts.index') !!}" class="side" >
                <img src="img/dronespot_4.jpg" alt="投稿一覧" style="max-width: 100%;">
            </a>
        </div>
    </div>

    <div class="mt-2 mb-3">
        <div class="nav nav-tabs nav-justified" id="list-tab">
            <a href="{{ route('users.mypage') }}" data-toggle="tab"
            class="nav-item nav-link {{Request::routeIs('users.mypage') ? 'active' : '' }}">
                スポット
            </a>
            <a href="#" class="nav-item nav-link" data-toggle="tab">
                お気に入り
            </a>
        </div>
        <div class="row col-9">
            <div class="tab-content" id="nav-tabContent" style="width:100%;">
                <div class="tab-pane active " id="nav-spot">
                    @include('posts.posts')
                </div>
            </div>
        </div>
            <div class="tab-pane" id="nav-favorite">
            </div>
        </div>
    </div>

    <style>
        a:hover {
            opacity: 0.6;
            transition-duration: 0.6s;
        }
    </style>

@endsection
