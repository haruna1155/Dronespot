@if (count($posts) > 0)
    <div class="d-flex justify-content-sm-around">
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mt-3" style="width: 19rem;">

                        <img class="card-img-top" src={{ $post->photo }} alt="posts">
                        <style>
                            .card-img-top {
                                display: block;
                                width: 100%;
                                height: 200px;
                            }
                        </style>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">スポット：{{ $post->spot }}</li>
                            <li class="list-group-item">アクセス：{{ $post->access }}</li>
                        </ul>

                        <div class="row mt-1 mb-1 d-flex justify-content-around">
                            @if(Auth::check())
                                <div class="btn-group">
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class='btn btn-outline-info btn-sm'>
                                        詳細を見る
                                    </a>
                                    <a href="#" class="btn btn-outline-warning btn-sm"><i class="fas fa-star"></i></a>
                                </div>
                            @else
                                <div class="btn-group">
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class='btn btn-outline-info btn-sm'>
                                        詳細を見る
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
@endif
