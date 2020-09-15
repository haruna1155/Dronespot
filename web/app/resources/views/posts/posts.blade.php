<div class="d-flex justify-content-sm-around">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mt-3">
                <img class="card-img-top" src="{{ asset('/img/test1.jpg') }}" alt="posts"> {{-- $spot->photo --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">スポット：</li> {{-- $spot->spot --}}
                    <li class="list-group-item">アクセス：</li> {{-- $spot->access --}}
                </ul>

                <div class="row mt-1 mb-1 d-flex justify-content-around">
                {{--@if(Auth::check())--}}
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-info btn-sm">詳細を見る</a>
                        <a href="#" class="btn btn-outline-warning btn-sm">お気に入り</a>
                    </div>
               {{-- @else--}}
                    {{-- <div class="btn-group">
                        <a href="#" class="btn btn-outline-info btn-sm">詳細を見る</a>
                    </div>
                @endif  --}}
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mt-3">
                <img class="card-img-top" src="{{ asset('/img/test2.jpg') }}" alt="posts"> {{-- $spot->photo --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">スポット：</li> {{-- $spot->spot --}}
                    <li class="list-group-item">アクセス：</li> {{-- $spot->access --}}
                </ul>

                <div class="row mt-1 mb-1 d-flex justify-content-around">
                {{--@if(Auth::check())--}}
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-info btn-sm">詳細を見る</a>
                        <a href="#" class="btn btn-outline-warning btn-sm">お気に入り</a>
                    </div>
               {{-- @else--}}
                    {{-- <div class="btn-group">
                        <a href="#" class="btn btn-outline-info btn-sm">詳細を見る</a>
                    </div>
                @endif  --}}
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mt-3">
                <img class="card-img-top" src="{{ asset('/img/test3.jpg') }}" alt="posts"> {{-- $spot->photo --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">スポット：</li> {{-- $spot->spot --}}
                    <li class="list-group-item">アクセス：</li> {{-- $spot->access --}}
                </ul>

                <div class="row mt-1 mb-1 d-flex justify-content-around">
                {{--@if(Auth::check())--}}
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-info btn-sm">詳細を見る</a>
                        <a href="#" class="btn btn-outline-warning btn-sm">お気に入り</a>
                    </div>
               {{-- @else--}}
                    {{-- <div class="btn-group">
                        <a href="#" class="btn btn-outline-info btn-sm">詳細を見る</a>
                    </div>
                @endif  --}}
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mt-3">
                <img class="card-img-top" src="{{ asset('/img/test4.jpg') }}" alt="posts"> {{-- $spot->photo --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">スポット：</li> {{-- $spot->spot --}}
                    <li class="list-group-item">アクセス：</li> {{-- $spot->access --}}
                </ul>

                <div class="row mt-1 mb-1 d-flex justify-content-around">
                {{--@if(Auth::check())--}}
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-info btn-sm">詳細を見る</a>
                        <a href="#" class="btn btn-outline-warning btn-sm">お気に入り</a>
                    </div>
               {{-- @else--}}
                    {{-- <div class="btn-group">
                        <a href="#" class="btn btn-outline-info btn-sm">詳細を見る</a>
                    </div>
                @endif  --}}
                </div>
            </div>
        </div>
    </div>
</div>

