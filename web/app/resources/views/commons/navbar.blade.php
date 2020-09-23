
<header style="border-bottom: solid 1px;">
    <nav class="navbar navbar-expand-sm bg-white navbar-light fixed-top py-3">
        <a class="navbar-brand pl-4" href="/">DRON SPOT</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="nav-bar">
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item active"><a href='/' class="nav-link">HOME</a></li>
                    <li class="nav-item">{!! link_to_route('posts.index','見つける', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item"><a href='＃' class="nav-link">マイページ</a></li>
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                @else
                    <li class="nav-item active"><a href='/' class="nav-link">HOME</a></li>
                    <li class="nav-item">{!! link_to_route('posts.index','見つける', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>
