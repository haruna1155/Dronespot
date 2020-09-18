@extends('layouts.app')

@section('content')
<div class="mt-3 d-flex justify-content-sm-center">
    <h2>スポットを共有する</h2>
</div>

<form class="mt-4">
    {{--写真--}}
    <div class="form-group row mt-4">
        <label for="photoFail" class="col-3">投稿写真</label>
        <div class="col-sm-6">
            <input type="file" class="form-control-file" id="photoFail">
        </div>
    </div>

    {{--スポット--}}
    <div class="form-group row mt-4">
        <label for="spot" class="col-3 col-form-label">スポット</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="spot">
        </div>
    </div>

    {{--エリア--}}
        <div class="form-group row mt-4">
            <label for="area" class="col-3 col-form-label">エリア</label>
            <div class="col-sm-6">
                <select class="form-control" id="area">
                    <option selected>〇〇地方</option>
                    <option>北海道地方</option>
                    <option>東北地方</option>
                    <option>関東地方</option>
                    <option>中部地方</option>
                    <option>近畿地方</option>
                    <option>中国地方</option>
                    <option>四国地方</option>
                    <option>九州地方</option>
                    <option>沖縄地方</option>
                </select>
            </div>
        </div>

        {{--アクセス--}}
        <div class="form-group row mt-4">
            <label for="access" class="col-3 col-form-label">アクセス</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="access">
            </div>
        </div>

        {{--コメント--}}
        <div class="form-group row mt-4">
            <label for="comment" class="col-3 col-form-label">コメント</label>
            <div class="col-sm-6">
                <textarea class="form-control" id="comment"></textarea>
            </div>
        </div>

        <div class="row mt-3 mb-4">
            <div class="col-sm">
                <div class="d-flex justify-content-center btn-block">
                    <a href='#' class="btn btn-info">登録</a>
                </div>
            </div>
        </div>


</form>

@endsection
