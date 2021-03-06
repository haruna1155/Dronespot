@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>{{ $user->name }}のマイページ</h2>
    </div>

    <div class="row col-3" style="float: left;">
        <div class="mt-2 mb-4 mr-3 ml-0">
            <a href="{!! route('posts.create') !!}" class="side">
                <img src="img/dronespot_3.jpg" alt="新規投稿"  style="max-width: 100%;">
            </a>
        </div>
        <div class="mt-2 mb-4 mr-3 ml-0">
            <a href="{!! route('posts.index') !!}" class="side" >
                <img src="img/dronespot_4.jpg" alt="投稿一覧" style="max-width: 100%;">
            </a>
        </div>
    </div>

    <div class="mt-2 mb-3  nav-justified">
        <ul class="nav nav-tabs" id="list-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ $active_tab == 'my-posts' ? 'active' : '' }}" id="my-posts-tab" data-toggle="tab" href="#my-posts" role="tab" aria-controls="my-posts" aria-selected="my-posts">
                    スポット
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active_tab == 'my-favorites' ? 'active' : '' }}" id="my-favorites-tab" data-toggle="tab" href="#my-favorites" role="tab" aria-controls="my-favorites" aria-selected="my-favorites">
                    お気に入り
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane {{ $active_tab == 'my-posts' ? 'active' : '' }}" id="my-posts" role="tabpanel" aria-labelledby="my-posts-tab">
                {{-- 自分が投稿したスポット --}}
                <div class="row justify-content-center">
                    @include('posts.posts', ['posts' => $my_posts])
                    <div class="mt-3">
                        {{ $my_posts->links() }}
                    </div>
                </div>
            </div>
            <div class="tab-pane {{ $active_tab == 'my_favorites' ? 'active' : '' }}" id="my-favorites" role="tabpanel" aria-labelledby="my-favorites-tab">
                {{-- お気に入り一覧 --}}
                <div class="row justify-content-center">
                    @include('posts.posts', ['posts' => $my_favorites])
                    <div class="mt-3">
                        {{ $my_favorites->links() }}
                    </div>
                </div>
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
