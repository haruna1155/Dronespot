<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function mypage()
    {
        if (\Auth::check()) {

            $user =\Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);

            return view('users.mypage', [
                'user' => $user,
                'posts' => $posts,
            ]);
        }
    }

    public function favorites($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $favorites = $user->favorites()->paginate(10);

        return view("users.favorites", [
            'user' => $user,
            'posts' => $favorites,
        ]);

    }
}
