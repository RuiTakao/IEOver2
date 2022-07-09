<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\MessageRoom;

class MessageRoomController extends Controller
{
    public function store(Request $request, Post $post, MessageRoom $messageRoom)
    {
        $requestUser = $request->user()->id;
        $postId = $post->id;
        $postUserId = $post->user->id;
        // dd($messageRoom);
        // ここがおかしい
        $searchMessageRoom = $messageRoom
            ->where('user_id', $requestUser)
            ->where('post_id', $postId)
            ->where('post_user_id', $postUserId)
            ->exists();


        $existMessageRoom = $messageRoom
            ->where('user_id', $requestUser)
            ->where('post_id', $postId)
            ->where('post_user_id', $postUserId)
            ->first('id');
            // dd($existMessageRoom);

        if (!($searchMessageRoom)){
            // メッセージルームは作った
            $messageRoom = new MessageRoom();
            $messageRoom->user_id = $requestUser;
            $messageRoom->post_id = $postId;
            $messageRoom->post_user_id = $postUserId;
            $messageRoom->save();

            return redirect()
                ->route('message.index', ['messageRoom' => $messageRoom->id]);
            } else {

            return redirect()
            //ここで$messageRoomのid探す
                ->route('message.index', ['messageRoom' => $existMessageRoom]);
        }

    }
}
