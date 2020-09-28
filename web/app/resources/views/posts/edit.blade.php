@extends("layouts.app")

@section("content")
<div class="mt-3 d-flex justify-content-sm-center">
    <h2>スポットの編集</h2>
</div>

<div class="mt-4 mb-3">
    {!! Form::model($post,['route' => ['posts.update', $post->id], 'method' => 'put']) !!}


        {{--スポット--}}
        <div class="form-group row mt-4">
            {!! Form::label('spot', 'スポット', ['class' => 'col-3']) !!}
            <div class="col-sm-6">
                {!! Form::text('spot', old('spot'), ['class' => 'form-control']) !!}
            </div>
        </div>

        {{--エリア--}}
        <div class="form-group row mt-4">
            {!! Form::label('area_id', 'エリア', ['class' => 'col-3']) !!}
            <div class="col-sm-6">
                {!! Form::select('area_id',[
                    '1' => '北海道地方',
                    '2' => '東北地方',
                    '3' => '関東地方',
                    '4' => '中部地方',
                    '5' => '近畿地方',
                    '6' => '中国地方',
                    '7' => '四国地方',
                    '8' => '九州地方',
                    '9' => '沖縄地方'],
                    old('area_id'),
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
                    {!! Form::submit('更新', ['class' => 'btn btn-info']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>

@endsection
