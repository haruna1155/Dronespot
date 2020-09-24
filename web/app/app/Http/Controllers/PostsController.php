<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

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
        if (\Auth::check()) {

            $post = new Post;

            return view('posts.create', [
                'post' => $post,
            ]);
        } else {
            return view('auth/login');
        }
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
            'area_id' => 'required',
            'access' => 'required',
            'comment' => 'required|max:300',
        ]);

        $request->user()->posts()->create([
            'photo' => $request->photo,
            'spot' => $request->spot,
            'area_id' => $request->area_id,
            'access' => $request->access,
            'comment' => $request->comment,
        ]);

        return back();
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
        $user->loadRelationshipCounts();
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
            //$post->photo = $request->photo;
            $post->spot = $request->spot;
            $post->area_id = $request->area_id;
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
