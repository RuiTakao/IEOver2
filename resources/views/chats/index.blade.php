@extends('layouts.app')

@section('content')
<section class="chat_form_section">
    <div class="container chat_form_content">
        <form class="chat_form" action="{{ route('chat.store', ['post' => $post]) }}" method="post">
            @csrf
            <textarea class="chat_form_textarea" name="chat" id="" cols="30" rows="10"></textarea>
            <div class="chat_form_btn_area">
                <input class="chat_form_btn" type="submit" value="送信">
            </div>
        </form>
    </div>
</section>

<section class="article_section">
    <div class="container article_content">
        <h3 class="article_content_title">{{ $post->title }}</h3>
        <div class="article_list_image"></div>
        <div class="article_content_tag">
            <span class="article_content_tag_icon">タグ：</span>
            <a class="article_content_tag_name" href="#">ソフトウェア開発</a>
        </div>
        <div class="article_content_post_user">
            <a href="#" class="article_content_post_user_name">投稿者：<span>{{ $post->user->name }}</span></a>
        </div>
        <p class="article_content_post_time"><time>{{ $post->created_at->format('Y.m.d') }}</time></p>
    </div>
</section>

<section class="chat_section">
    <div class="container chat_content">
        <ul class="chat_lists">
            @foreach ($chats as $chat)
            <li class="chat_list">
                <div class="chat_list_head">
                    <div class="chat_user_icon"></div>
                    <div class="chat_user_status">
                        <a class="chat_user_name" href="#">{{ $chat->user->name }}</a>
                        <p class="chat_post_time">2022.6.16</p>
                    </div>
                </div>
                <p class="chat_list_body">{{ $chat->chat }}</p>
                <div class="chat_list_like_icon"></div>
            </li>
            @endforeach
        </ul>
    </div>
</section>

@endsection
