@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>スポットを見つける</h2>
    </div>
    <div class="col-6 justify-content-around mx-auto">
        {!! Form::open(['route' => ['posts.index'], 'method' => 'get']) !!}
            <div class="form-group mt-3 d-flex">
                {!! Form::select('area', $areas, old('area'), ['class' => 'form-control' ,'placeholder' => '地方別検索']) !!}
                {!! Form::submit('検索', ['class' => 'btn btn-info']) !!}
            </div>
        {!! Form::close() !!}
    </div>



    {{-- 投稿一覧 --}}
    @include('posts.posts', ['size' => 'lg'])

    <div class="mt-3 mb-2 row justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection
