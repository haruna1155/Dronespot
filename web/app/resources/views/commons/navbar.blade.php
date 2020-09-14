
<header>
    <nav class="navbar navbar-expand-sm bg-white navbar-light fixed-top py-3">
        <a class="navbar-brand pl-4" href="/">DRON SPOT</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="nav-bar">
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item active"><a href='/' class="nav-link">HOME</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">見つける</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">会員登録</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">ログイン</a></li>
                @else
                    <li class="nav-item active"><a href='/' class="nav-link">HOME</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">見つける</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">マイページ</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">ログアウト</a></li>
                @endif
            </ul>
        </div>    
    </nav>    
</header>