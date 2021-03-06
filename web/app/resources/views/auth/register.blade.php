@extends('layouts.app')

@section('content')
    <div class="mt-3 d-flex justify-content-sm-center">
        <h2>新規会員登録</h2>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', '再確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                <div class="mt-5 mb-4">
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

        </div>
    </div>

@endsection
