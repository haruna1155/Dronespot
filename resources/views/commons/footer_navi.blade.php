<footer>
    <div class="footer_navi navbar navbar-expand-sm navbar-light">
        <a class="navbar-brand pl-5" href="/">DRON SPOT</a>
        
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
</footer>