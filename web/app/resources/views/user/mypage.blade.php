@extends('layouts.app')

@section('content')
<div class="mt-3 d-flex justify-content-sm-center">
    <h2>[user->name]のマイページ</h2>
</div>

<div class="row mt-5 mb-4">
    <div class="d-flex justify-content-center btn-block">
        <div class="col-sm-6">
            <a href='#' class="btn btn-info btn-block btn-lg">スポットを共有しよう</a>
        </div>
    </div>
</div>

<br>
<br>

<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="#" class="nav-link active">スポット</a></li>
    <li class="nav-item"><a href="#" class="nav-link">お気に入り</a></li>
</ul>







@endsection
