@extends('layouts.app')

@section('content')
<section class="article_section">
    <div class="container article_container">
        <div class="article_content">
            <p class="article_post_time"><time>{{ $post->created_at->format('Y年n月j日') }}</time></p>
            <h3 class="article_title">{{ $post->title }}</></h3>
            <div class="article_tag">
                <span class="article_tag_icon">タグ：</span>
                <a class="article_tag_name" href="#">ソフトウェア開発</a>
            </div>
            <div class="article_image"></div>
            <p class="article_sub_title">{{ $post->sub_title }}</p>
            <p class="article_body">{!! nl2br(e($post->body)) !!}</p>
            <div class="article_post_user">
                <a href="{{ route('user.show', ['user' => $post->user->id]) }}" class="article_post_user_name">投稿者：<span>{{ $post->user->name }}</span></a>
            </div>
        </div>
        <div class="article_config">
            @if (auth()->user()->id == $post->user->id)
            <button class="article_config_btn">･･･</button>
            {{-- モーダルここから --}}
            <div class="article_config_menu">
                <div class="article_edit article_config_menu_btn">
                    <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="article_edit_btn">編集</a>
                </div>
                <div class="article_delete article_config_menu_btn">
                    <form action="{{ route('post.destroy',  ['post' => $post->id]) }}" class="article_delete_form" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="article_delete_btn" type="submit" value="削除">
                    </form>
                </div>
            </div>
            {{-- モーダルここまで --}}
            @endif
        </div>
    </div>
    @if (!(auth()->user()->id == $post->user->id))
    <div class="container access_message_room_container">
        <form class="access_message_room_form" action="{{ route('createMessageRoom.store', ['post' => $post->id]) }}" method="post">
            @csrf
            <input class="access_message_room_btn" type="submit" value="コメントする">
        </form>
    </div>
    @endif
</section>
@if ((auth()->user()->id == $post->user->id))
<section>
    <div class="container article_message_section">
        <ul class="article_message_list">
            @foreach ($messageRooms as $messageRoom)
            @php
            $messageDate = $message->where('message_room_id', $messageRoom->id)->pluck('created_at')->last()
            @endphp
            <a class="article_message_link" href="{{ route('message.index', ['messageRoom' => $messageRoom->id]) }}">
                <li class="article_message">
                    <div class="article_message_head">
                        <div class="article_message_user">
                            <div class="article_message_user_icon"></div>
                            <p class="article_message_user_name">{{ $messageRoom->user->name }}</p>
                        </div>
                        <div class="article_message_post_time">
                            <time>
                            {{ $messageDate->format('n月j日 G時i分') }}
                            </time>
                        </div>
                    </div>
                    <div class="article_message_body">
                        <p class="article_message_contents_first">{{  $message->where('message_room_id', $messageRoom->id)->pluck('message')->last() }}</p>
                    </div>
                </li>
            </a>
            @endforeach
        </ul>
    </div>
</section>
@endif
@endsection
