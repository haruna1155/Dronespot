@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>スポットの詳細</h2>
    </div>


    <div class="container">
        <div class="row d-flex justify-content-sm-center">
            <div class="post-photo" style="width: 600px">
                <img src=img/test2.jpg alt="posts">{{-- $spot->photo --}}
            </div>
            <div class="card mt-3" style="width: 45rem;">
                <h5 class="card-header">スポット</h5> {{-- $spot->spot --}}
                <div class="list-group list-group-flush">
                    <p class="list-group-item">投稿日時:</p> {{-- $spot->created_at --}}
                    <p class="list-group-item">ユーザー名:</p> {{-- $spot->user --}}
                    <p class="list-group-item">エリア：</p> {{-- $spot->aria --}}
                    <p class="list-group-item">アクセス：</p> {{-- $spot->access --}}
                    <p class="list-group-item">ユーザーコメント：</p> {{-- $spot->content --}}
                </div>
                    <div class="card-body d-flex justify-content-end">
                    {{--@if(Auth::check())--}}
                    <a href="#" class="btn btn-outline-warning btn-sm"><i class="fas fa-star"></i></a> {{--お気に入り--}}
                    <a href="#" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a> {{--編集--}}
                    <a href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a> {{--削除--}}
                    {{-- @endif  --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-4">
        <div class="col-sm">
            <div class="d-flex justify-content-center btn-block">
                <a href='#' class="btn btn-secondary">戻る</a>
            </div>
        </div>
    </div>


@endsection
