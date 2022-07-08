<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        $url = [
            'js' => asset('js/posts/app.js'),
            'css' => asset('css/posts/app.css'),
        ];

        return view('posts.index', ['posts' => $posts, 'url' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = [
            'js' => asset('js/posts/app.js'),
            'css' => asset('css/posts/app.css'),
        ];

        return view('posts.create', ['url' => $url]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->body = $request->body;
        $post->user_id = $request->user()->id;
        $post->save();

        return redirect()
            ->route('user.show', ['user' => $post->user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Post $post)
    {
        $url = [
            'js' => asset('js/posts/app.js'),
            'css' => asset('css/posts/app.css'),
        ];

        return view('posts.show', ['post' => $post, 'url' => $url]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $url = [
            'js' => asset('js/posts/app.js'),
            'css' => asset('css/posts/app.css'),
        ];

        if (!(auth()->user()->id == $post->user->id)) {
            return redirect()
                ->route('user.show', ['user' => auth()->user()->id]);
        }
        return view('posts.edit', ['post' => $post, 'url' => $url]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (!(auth()->user()->id == $post->user->id)) {
            return redirect()
                ->route('user.show', ['user' => auth()->user()->id]);
        }

        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('user.show', ['user' => $post->user_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (!(auth()->user()->id == $post->user->id)) {
            return redirect()
                ->route('user.show', ['user' => auth()->user()->id]);
        }
        $post->delete();

        return redirect()
            ->route('user.show', ['user' => $post->user_id]);
    }
}
