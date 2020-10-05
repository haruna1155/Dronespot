<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    /**
     * エリア一覧を、 [ {id} => {name} ] の形式で取得する。
     *
     * @return array
     */

     public static function toSimpleArry()
     {
         $rtn = [];

         foreach (self::orderBy('id')->get() as $e) {
            $rtn[$e->id] = $e->name;
        }

        return $rtn;
    }
     }
}
