@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>スポットを共有する</h2>
    </div>

    <div class="mt-4">
        {!! Form::model($post,['route' => 'posts.store']) !!}

            {{--写真--}}
            <div class="form-group row mt-4">
                {!! Form::label('photo', '投稿写真', ['class' => 'col-3']) !!}
                <div class="col-sm-6">
                    {!! Form::file('photo', old('photo'), ['class' => 'form-control']) !!}
                </div>
            </div>

            {{--スポット--}}
            <div class="form-group row mt-4">
                {!! Form::label('spot', 'スポット', ['class' => 'col-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('spot', old('spot'), ['class' => 'form-control']) !!}
                </div>
            </div>

            {{--エリア--}}
            <div class="form-group row mt-4">
                {!! Form::label('area', 'エリア', ['class' => 'col-3']) !!}
                <div class="col-sm-6">
                    {!! Form::select('area',[
                        '北海道地方' => '北海道地方',
                        '東北地方' => '東北地方',
                        '関東地方' => '関東地方',
                        '中部地方' => '中部地方',
                        '近畿地方' => '近畿地方',
                        '中国地方' => '中国地方',
                        '四国地方' => '四国地方',
                        '九州地方' => '九州地方',
                        '沖縄地方' => '沖縄地方'],
                        old('area'),
                        ['class' => 'form-control' ,'placeholder' => '〇〇地方'])
                    !!}
                </div>
            </div>

            {{--アクセス--}}
            <div class="form-group row mt-4">
                {!! Form::label('access', 'アクセス', ['class' => 'col-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('access', old('access'), ['class' => 'form-control']) !!}
                </div>
            </div>

            {{--コメント--}}
            <div class="form-group row mt-4">
                {!! Form::label('comment', 'コメント', ['class' => 'col-3']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('comment', old('comment'), ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row mt-3 mb-4">
                <div class="col-sm">
                    <div class="d-flex justify-content-center btn-block">
                        {!! Form::submit('登録', ['class' => 'btn btn-info']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
