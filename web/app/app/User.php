<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function favorites() {
        return $this->belongsToMany(Post::class,'favorites', 'user_id', 'post_id')->withTimestamps();
    }

    public function favorite($postId)
    {
        //お気に入りしているかどうか
        $exist=$this->is_favorites($postId);
        //自分の投稿かどうか
        $its_me=$this->id==$postId;

        if ($exist || $its_me) {
            return false;
        } else {
            $this->favorites()->attach($postId);
            return true;
        }
    }

    public function unfavorite($postId)
    {
        //お気に入りしているかどうか
        $exist=$this->is_favorites($postId);
        //自分の投稿かどうか
        $its_me=$this->id==$postId;

        if ($exist && $its_me) {
            return true;
        } else {
            $this->favorites()->detach($postId);
            return false;
        }
    }

    public function is_favorites($postId)
    {
        return $this->favorites()->where("post_id",$postId)->exists();
    }


    public function loadRelationshipCounts() {
        $this->loadCount('posts','favorites');

    }
}
