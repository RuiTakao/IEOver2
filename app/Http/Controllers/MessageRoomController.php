<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\MessageRoom;

class MessageRoomController extends Controller
{
    public function store(Request $request, Post $post, MessageRoom $messageRooms)
    {
        /** リクエストしたユーザーのID */
        $requestUser = $request->user()->id;
        /** リクエストされた投稿のID */
        $postId = $post->id;
        /** リクエストされた投稿の投稿者のID */
        $postUserId = $post->user->id;

        /** リクエストしたユーザーIDと投稿ID、その投稿の投稿者IDが完全に一致したmessage_roomsのレコードを探している */
        $searchMessageRoom = $messageRooms
            ->where('user_id', $requestUser)
            ->where('post_id', $postId)
            ->where('post_user_id', $postUserId)
            ->exists();

            /** リクエストしたユーザーIDと投稿ID、その投稿の投稿者IDが完全に一致したmessage_roomsのレコードがあるかどうかを判定している */
        if (!($searchMessageRoom)){
            /** 無ければ作る */
            $messageRoom = new MessageRoom();
            $messageRoom->user_id = $requestUser;
            $messageRoom->post_id = $postId;
            $messageRoom->post_user_id = $postUserId;
            $messageRoom->save();

            /** 作ったmessage_roomsのidをパスに代入してメッセージページにリダイレクト */
            return redirect()
                ->route('message.index', ['messageRoom' => $messageRoom->id]);
        } else {
            /** リクエストしたユーザーIDと投稿ID、その投稿の投稿者IDが完全に一致したmessage_roomsのレコードを取得している */
            $messageRoom = $messageRooms
                ->where('user_id', $requestUser)
                ->where('post_id', $postId)
                ->where('post_user_id', $postUserId)
                ->first('id');

            /** 取得したIDをパスに代入し、メッセージページへリダイレクト */
            return redirect()
                ->route('message.index', ['messageRoom' => $messageRoom]);
        }
    }
}
