<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts = Post::latest()->where('user_id' , $user->id)->get();
        // $myChats = チャットした投稿

        if (auth()->user()->id == $user->id) {
            return view('users.mypage', ['user' => $user, 'posts' => $posts]);
        } else {
            return view('users.user', ['user' => $user, 'posts' => $posts]);
        }
    }
}
