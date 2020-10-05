<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Area;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // エリア一覧を取得
        $areas = Area::toSimpleArray();

        // エリアを検索
        $search_area = $request->input('area');
        $posts =
            Post::genarateSearchQuery(Auth::id(), ['area_id' => $search_area])
            ->paginate(10)->appends(['area' => $search_area]);
        return view('posts.index', compact('posts', 'areas', 'search_area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
            'areas' => Area::toSimpleArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|image|mimes:jpeg, jpg, png',
            'spot' => 'required|max:30',
            'area' => 'required',
            'access' => 'required',
            'comment' => 'required|max:300',
        ]);

        //ユーザーIDを取得
        $user_id = Auth::id();

        // 画像を保存、パスを取得
        $photo_url = Post::putPhoto($user_id, $request->file('photo'));

        // DBに保存
        $post = new Post($request->post());
        $post->user_id = $user_id;
        $post->area_id = $request->area;
        $post->photo = $photo_url;
        $post->save();

        return redirect(route('posts.show', ['post' => $post]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post  $post)
    {
        // 必要な情報をくっつける
        $post = Post::with(['user', 'area', 'favorites' => function ($query) {
            $query->where('favorites.user_id',  Auth::id());
        }])->find($post->id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        if (Auth::id() === $post->user_id) {
            return redirect('/');
        }
        return view('posts.edit', [
            'post' => $post,
            'areas' => Area::toSimpleArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // 投稿主が違うなら、トップページへ
        $user = Auth::user();
        if ($user->id !== $post->user_id) {
            return redirect('/');
        }
        // バリデーション
        $request->validate([
            //'photo' => 'required|file|image|mimes:jpeg,png',
            'spot' => 'required|max:30',
            'area' => 'required',
            'access' => 'required',
            'comment' => 'required|max:300',
        ]);

        // DBに保存
        $post->spot = $request->spot;
        $post->area_id = $request->area;
        $post->access = $request->access;
        $post->comment = $request->comment;
        $post->save();

        return view('posts.show', [
            'post' => $post,
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  App/Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // 投稿主が違うなら、トップページへ
        if (Auth::id() !== $post->user_id) {
            return redirect('/');
        }
        $post->delete();
        return redirect('/');
    }
}
