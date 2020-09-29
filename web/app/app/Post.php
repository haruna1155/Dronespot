<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'photo','spot', 'access', 'comment',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function favorite_users() {
        return $this->belongsToMany(User::class,'favorites','post_id','user_id')->withTimestamps();
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

}
