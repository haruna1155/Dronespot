@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>スポットの詳細</h2>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="card detail mt-3 mb-5 d-flex justify-content-center">
                <img class="card-img-top mx-auto" src="{{ asset('/img/test2.jpg') }}" alt="posts"> {{-- $spot->photo --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">スポット：</li> {{-- $spot->spot --}}
                    <li class="list-group-item">アクセス：</li> {{-- $spot->access --}}
                </ul>

                <div class="row mt-1 mb-2 d-flex justify-content-around">
                {{--@if(Auth::check())--}}
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-warning btn-sm">お気に入り</a>

                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-warning btn-sm">編集</a>

                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-denger btn-sm">削除</a>

                    </div>
               {{-- @endif  --}}
                </div>
            </div>
        </div>
    </div>

@endsection
