@extends('layouts.app')

@section('content')
<section class="chat_form_section">
    <div class="container chat_form_content">
        <form class="chat_form" action="{{ route('message.store', ['messageRoom' => $messageRoom]) }}" method="post">
            @csrf
            <textarea class="chat_form_textarea" name="message" id="" cols="30" rows="10"></textarea>
            <div class="chat_form_btn_area">
                <input class="chat_form_btn" type="submit" value="コメントする">
            </div>
        </form>
    </div>
</section>

<section class="article_section">
    <div class="container article_content">
        <h3 class="article_content_title">{{ $messageRoom->post->title }}</h3>
        <div class="article_list_image"></div>
        <div class="article_content_tag">
            <span class="article_content_tag_icon">タグ：</span>
            <a class="article_content_tag_name" href="#">ソフトウェア開発</a>
        </div>
        <div class="article_content_post_user">
            <a href="{{ route('user.show', ['user' => $messageRoom->post->user->id]) }}" class="article_content_post_user_name">投稿者：<span>{{ $messageRoom->post->user->name }}</span></a>
        </div>
        <p class="article_content_post_time"><time>{{ $messageRoom->post->created_at->format('Y.m.d') }}</time></p>
    </div>
</section>

<section class="chat_section">
    <div class="container chat_content">
        <ul class="chat_lists">
            @foreach ($messages as $message)
            <li class="chat_list">
                <div class="chat_list_head">
                    <div class="chat_user_icon"></div>
                    <div class="chat_user_status">
                        <a class="chat_user_name" href="{{ route('user.show', ['user' => $message->user->id]) }}">{{ $message->user->name }}</a>
                        <p class="chat_post_time">{{ $message->created_at->format('n月j日 G時i分') }}</p>
                    </div>
                </div>
                <p class="chat_list_body">{{ $message->message }}</p>
                <div class="chat_list_like_icon"></div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection
