@if (count($posts) > 0)
    <div class="row">
        @foreach ($posts as $post)
            <div class="{{ $size === 'lg' ? "col-lg-4 col-md-6 col-sm-12" : "col-lg-6 col-md-12" }}">
                <div class="card mt-3 max-auto">

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

                    <div class="mt-1 mb-1 d-flex justify-content-center">
                        @if(Auth::id() == $post->user_id)
                            <div class="btn-group">
                                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class='btn btn-outline-info btn-sm'>
                                    詳細を見る
                                </a>
                            </div>
                        @else
                            <div class="btn-group">
                                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class='btn btn-outline-info btn-sm'>
                                    詳細を見る
                                </a>
                                @include('commons.favorite_button')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endif
