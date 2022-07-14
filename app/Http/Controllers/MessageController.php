<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageRoom;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(Request $request, MessageRoom $messageRoom)
    {
        $messages = Message::latest()->where('message_room_id', $messageRoom->id)->get();
        $messagePost = Message::where('message_room_id', $messageRoom->id)->first();

        function url($param){
            return  [
                'js' => asset('js/' . $param . '/app.js'),
                'css' => asset('css/' . $param . '/app.css'),
            ];
        }

        $invalidUser = $messageRoom->user_id == $request->user()->id || $messageRoom->post_user_id == $request->user()->id;

        if (!($invalidUser)) {
            return redirect()
                ->route('posts.index');
        }

        return view('message.index', ['messages' => $messages, 'messageRoom' => $messageRoom, 'url' => url('messages')]);
    }

    public function store(Request $request, MessageRoom $messageRoom)
    {
        $message = new Message();
        $message->message = $request->message;
        $message->user_id = $request->user()->id;
        $message->message_room_id = $messageRoom->id;
        $message->save();

        return redirect()
            ->route('message.index', ['messageRoom' => $messageRoom]);
    }
}
