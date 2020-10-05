<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Favorite;

class FavoritesController extends Controller
{
    public function store(Post $post)
    {
        //自分の投稿かどうか
        $user_id = Auth::id();
        //もし自分の投稿だった場合は何もしない
        if ($post->user_id === $user_id) {
            return back();
        }

        //既に登録済みなら何もしない
        $post_id = $post->id;
        $favorite = $this->findFavorite($user_id, $post_id);
        if ($favorite) {
            return back();
        }

        // お気に入り登録
        Favorite::create(compact('user_id', 'post_id'));
        return back();
    }

    public function destroy(Post $post)
    {
        // お気に入りしてなければ、何もしない
        $user_id = Auth::id();
        $post_id = $post->id;
        $favorite = $this->findFavorite($user_id, $post_id);
        if (!$favorite) {
            return back();
        }

        // お気に入り解除
        $favorite->delete();
        return back();
    }

    /**
     * スポットIDとユーザーIDをもとに、お気に入りを検索
     *
     * @param int $user_id
     * @param int $post_id
     * @return App\Favorite|null
     */
    private function findFavorite(int $user_id, int $post_id)
    {
        return Favorite::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->first();
    }
}
