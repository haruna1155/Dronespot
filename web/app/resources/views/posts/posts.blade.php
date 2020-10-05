@if (count($posts) > 0)
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mt-3">

                    <img class="card-img-top" src={{ $post->photo }} alt="posts">
                    <style>
                        .card-img-top {
                            height: 200px;
                            object-fit: cover;
                        }
                    </style>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">スポット：{{ $post->spot }}</li>
                        <li class="list-group-item">アクセス：{{ $post->access }}</li>
                    </ul>

                    <div class="mt-1 mb-1 d-flex justify-content-center">
                        <div class="btn-group">
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class='btn btn-outline-info btn-sm'>
                                詳細を見る
                            </a>
                        </div>

                        {{-- 認証済み && 投稿主でなければ、お気に入りボタンを表示 --}}
                        @if (Auth::id() && Auth::id() !== $post->user_id)
                            @include('commons.favorite_button')
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
