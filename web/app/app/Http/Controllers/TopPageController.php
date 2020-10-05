<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Post;

class TopPageController extends Controller
{
    public function index()
    {
        $posts = Post::genarateSearchQuery(Auth::id())->limit(12)->get();

        return view('welcome', [
            'posts' => $posts,
        ]);
    }
}
