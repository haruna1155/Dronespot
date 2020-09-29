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
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index', [
           'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $post = new Post;
            $areas = config('const');
            foreach (Area::all() as $area) {
                $area[$area->id] = $area->name;
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
            'photo' => 'required|file|image|mimes:jpeg,png',
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
        $user =\Auth::user();
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

        if(\Auth::id() === $post->user_id) {
            return view('posts.edit', [
                'post' => $post,
            ]);
        } else {
            return redirect ('/');
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
        $user =\Auth::user();

        if(\Auth::id() === $post->user_id) {
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
        return back();
    }
}
