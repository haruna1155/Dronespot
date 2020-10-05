<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    const PHOTO_DIR = 'public/photos/{user_id}';

    protected $fillable = [
        'photo', 'spot', 'access', 'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }


    /**
     * アップロードされた写真をサーバー側に格納する。
     *
     * @param int $user_id ユーザーID
     * @param UploadedFile $photo 写真ファイル
     * @return string 格納後の写真のパス
     */
    public static function putPhoto(int $user_id, UploadedFile $photo)
    {
        $dir = str_replace('{user_id}', $user_id, self::PHOTO_DIR);
        return  Storage::url($photo->store($dir));
    }

    /**
     * スポット検索用クエリを生成する。
     *
     * @param int $user_id
     * @param array $condition ['area_id' => int, 'mine_only' => bool, 'my_favorites_only' => bool]
     * @return Illuminate\Database\Eloquent\Builder
     */
    static public function genarateSearchQuery(?int $user_id, array $condition = [])
    {
        // 全件検索
        $query =
            self::with(['user', 'area', 'favorites' => function ($query) use ($user_id) {
                $query->where('favorites.user_id', $user_id);
            }])
            ->orderBy('created_at', 'desc');

        // エリアで検索
        if (@$condition['area_id']) {
            $query->whereHas('area', function ($query) use ($condition) {
                $query->where('id', $condition['area_id']);
            });
        }

        // 自分の投稿のみ
        if (@$condition['mine_only']) {
            $query->where('user_id', $user_id);
        }

        // 自分のお気に入りのみ
        if (@$condition['my_favorites_only']) {
            $query->whereHas('favorites', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            });
        }

        return $query;
    }
}
