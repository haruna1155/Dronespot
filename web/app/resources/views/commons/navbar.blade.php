
<header style="border-bottom: solid 1px;">
    <nav class="navbar navbar-expand-sm bg-white navbar-light fixed-top py-3">
        <a class="navbar-brand pl-4" href="/">DRON SPOT</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="nav-bar">
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item">
                        <a href='/' class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            HOME
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('posts.index')}}" class="nav-link {{Request::routeIs('posts.index') ? 'active' : '' }}">
                            見つける
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.mypage')}}" class="nav-link {{Request::routeIs('users.mypage') ? 'active' : '' }}">
                            マイページ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('logout.get')}}" class="nav-link {{Request::routeIs('logout.get') ? 'active' : '' }}">
                            ログアウト
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href='/' class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            HOME
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('posts.index')}}" class="nav-link {{Request::routeIs('posts.index') ? 'active' : '' }}">
                            見つける
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('signup.get')}}" class="nav-link {{Request::routeIs('signup.get') ? 'active' : '' }}">
                            会員登録
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link {{Request::routeIs('login') ? 'active' : '' }}">
                            ログイン
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
