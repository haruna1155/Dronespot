<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

class UsersController extends Controller
{
    public function mypage(Request $request)
    {

        $user = \Auth::user();

        //今開いてるタブを取得
        $active_tab = $request->input('active_tab') ?: 'my-posts';

        // 自分の投稿一覧を取得
        $my_posts = Post::genarateSearchQuery($user->id, ['mine_only' => true])->paginate(12, ['*'], 'my-posts')->appends([
            'active-tab' => 'my-posts',
            'my-favorites' => $request->input('my-favorites'),
        ]);

        // 自分のお気にいり一覧を取得
        $my_favorites = Post::genarateSearchQuery($user->id, ['my_favorites_only' => true])->paginate(12, ['*'], 'my-favorites')->appends([
            'actuve-tab' => 'my-faborites',
            'my-posts' => $request->input('my-posts'),
        ]);

        return view('users.mypage', [
            'user' => $user,
            'my_posts' => $my_posts,
            'my_favorites' => $my_favorites,
            'active_tab' => $active_tab,
        ]);
    }
}
