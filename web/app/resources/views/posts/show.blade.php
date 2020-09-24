@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>スポットの詳細</h2>
    </div>


    <div class="container">
        <div class="row d-flex justify-content-sm-center">
            <div class="post-photo" style="width: 600px">
                <img src={{ $post->photo }} alt="posts">
            </div>
            <div class="card mt-3" style="width: 45rem;">
                <h5 class="card-header">スポット: {{ $post->spot }}</h5>
                <div class="list-group list-group-flush">
                    <p class="list-group-item">投稿日時: {{ $post->created_at }}</p>
                    <p class="list-group-item">ユーザー名: {{ $user->name }}</p>
                    <p class="list-group-item">エリア： {{ $post->area }}</p>
                    <p class="list-group-item">アクセス： {{ $post->access }}</p>
                    <p class="list-group-item">コメント： {{ $post->comment }}</p>
                </div>
                    <div class="card-body d-flex justify-content-end">
                    @if(Auth::id() == $post->user_id)
                    {{--お気に入り--}}
                    <a href="#" class="btn btn-outline-warning btn-sm"><i class="fas fa-star"></i></a>
                    {{--編集--}}
                    {{--{!! link_to_route('posts.edit', '<i class="fas fa-edit"></i>', ['class' => "btn btn-outline-success btn-sm"]) !!} --}}
                    {{--削除--}}
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="fas fa-trash"></i>', ['class' =>"btn btn-outline-danger btn-sm", 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-4">
        <div class="col-sm">
            <form>
                <div class="d-flex justify-content-center btn-block">
                    <input type="button" class="btn btn-secondary" value="戻る" onClick="history.back()">
                </div>
            </form>
        </div>
    </div>


@endsection
