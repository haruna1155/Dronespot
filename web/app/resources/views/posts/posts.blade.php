@if (count($posts) > 0)
<div class="d-flex justify-content-sm-around">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mt-3" style="width: 19rem;">
                @foreach ($posts as $post)
                <img class="card-img-top" src="/img/test1.jpg" alt="posts"> {{-- $spot->photo --}}
                <style>
                    .card-img-top {
                        display: block;
                        width: 100%;
                        height: 200px;
                    }
                </style>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">スポット：{{ $spot->spot }}</li>
                    <li class="list-group-item">アクセス：{{ $spot->access }}</li>
                </ul>
                @endforeach

                <div class="row mt-1 mb-1 d-flex justify-content-around">
                @if(Auth::check())
                    <div class="btn-group">
                        {!! link_to_route('posts.show', '詳細を見る', ['class' => 'btn btn-outline-info btn-sm']) !!}
                        <a href="#" class="btn btn-outline-warning btn-sm"><i class="fas fa-star"></i></a>
                    </div>
                @else
                    <div class="btn-group">
                        {!! link_to_route('posts.show', '詳細を見る', ['class' => 'btn btn-outline-info btn-sm']) !!}
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>

    {{ $posts->links() }}
</div>
@endif
