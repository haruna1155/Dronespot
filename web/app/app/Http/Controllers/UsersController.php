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
}
