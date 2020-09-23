<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'photo','spot', 'area', 'access', 'comment',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
