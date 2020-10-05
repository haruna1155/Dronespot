<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * スポットIDとユーザーIDをもとに、お気に入りを検索
     *
     * @param int $user_id
     * @param int $post_id
     * @return App\Favorite|null
     */
    public static function findFavorite(int $user_id, int $post_id)
    {
        return self::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->first();
    }
}
