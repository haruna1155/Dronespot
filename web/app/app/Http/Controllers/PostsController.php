<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $areas = [];
        foreach (Area::orderBy('id')->get() as $area) {
            $areas[$area->id] = $area->name;
        }

        // 全件取得用クエリを設定
        $user_id = Auth::id();
        $posts =
            Post::with(['user', 'area', 'favorites' => function ($query) use ($user_id) {
                $query->where('favorites.user_id', $user_id);
            }])
            ->orderBy('posts.created_at', 'desc');

        // もし検索するエリアがあったら一致するエリアを取得
        // 検索するエリアがなかったら全部表示
        $search_area = $request->input('area');
        if ($search_area) {
            $posts->whereHas('area', function ($query) use ($search_area) {
                $query->where('id', $search_area);
            });
        }
        //ページ切り替え時にも検索を有効化
        $posts = $posts->paginate(10)->appends(['area' => $search_area]);

        return view('posts.index', compact('posts', 'areas', 'search_area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        $areas = [];
        foreach (Area::orderBy('id')->get() as $area) {
            $areas[$area->id] = $area->name;
        }

        return view('posts.create', [
            'post' => $post,
            'areas' => $areas,
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
        $post->area_id = $request->post()['area'];
        $post->photo = $photo_url;
        $post->save();

        return redirect(route('posts.show', ['post' => $post]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Auth::user();
        $post = Post::findOrFail($id);


        return view('posts.show', [
            'post' => $post,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (\Auth::id() === $post->user_id) {
            return view('posts.edit', [
                'post' => $post,
            ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            //'photo' => 'required|file|image|mimes:jpeg,png',
            'spot' => 'required|max:30',
            'area_id' => 'required',
            'access' => 'required',
            'comment' => 'required|max:300',
        ]);

        $post = Post::findOrFail($id);
        $user = \Auth::user();

        if (\Auth::id() === $post->user_id) {
            $post->spot = $request->spot;
            $post->area_id = $request->post()['area'];
            $post->access = $request->access;
            $post->comment = $request->comment;
            $post->save();
        }
        return view('posts.show', [
            'post' => $post,
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }
        return redirect('/');
    }
}
