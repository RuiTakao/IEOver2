<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostChat;
use App\Models\User;

class ChatController extends Controller
{
    public function chatAuth(Request $request)
    {
        $chat = new PostChat();
        $chat->user_id = $request->user()->id;
        $chat->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Post $post)
    {
        $chats = PostChat::latest()->where('post_id', $post->id)->get();

        return view('chats.index',['post' => $post, 'chats' => $chats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Post $post)
    {
        $chat = new PostChat();
        $chat->chat = $request->chat;
        $chat->user_id = $request->user()->id;
        $chat->post_id = $post->id;
        $chat->save();

        return redirect()
            ->route('chat.index', ['user' => $post->user_id, 'post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
