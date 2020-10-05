@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>スポットの詳細</h2>
    </div>


    <div class="container">
        <div class="row d-flex justify-content-sm-center">
            <div class="post-photo text-center" style="width: 90%">
                <img src={{ $post->photo }} alt="posts" style="max-width:90%; max-hight:90%;">
            </div>
            <div class="card mt-3" style="width: 45rem;">
                <h5 class="card-header">スポット: {{ $post->spot }}</h5>
                <div class="list-group list-group-flush">
                    <p class="list-group-item">投稿日時: {{ $post->created_at }}</p>
                    <p class="list-group-item">ユーザー名: {{ $post->name }}</p>
                    <p class="list-group-item">エリア： {{ $post->area->name }}</p>
                    <p class="list-group-item">アクセス： {{ $post->access }}</p>
                    <p class="list-group-item">コメント： {{ $post->comment }}</p>
                </div>
                @if (Auth::id())
                    <div class="card-body d-flex justify-content-end">
                        @if (Auth::id() == $post->user_id)
                            {{--編集--}}
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            {{--削除--}}
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="fas fa-trash"></i>', ['class' =>"btn btn-outline-danger btn-sm", 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        @else
                            {{--お気に入り--}}
                            @include('commons.favorite_button')
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="row mt-3 mb-4">
        <div class="col-sm">
            <div class="d-flex justify-content-center btn-block">
                @if(Auth::check())
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    みんなの投稿一覧に戻る
                </a>
                <a href="{{ route('users.mypage') }}" class="btn btn-secondary ml-2">
                    自分の投稿一覧に戻る
                </a>
                @else
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    みんなの投稿一覧に戻る
                </a>
                @endif
            </div>
        </div>
    </div>


@endsection
