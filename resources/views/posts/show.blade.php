@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="article_shows">
            <div class="article_show">
                <div class="article_show_content">
                    <p class="article_show_post_time"><time>{{ $post->created_at->format('Y.m.d') }}</time></p>
                    <h3 class="article_show_title">{{ $post->title }}</></h3>
                    <div class="article_show_tag">
                        <span class="article_show_tag_icon">タグ：</span>
                        <a class="article_show_tag_name" href="#">ソフトウェア開発</a>
                    </div>
                    <div class="article_show_image"></div>
                    <p class="article_show_sub_title">{{ $post->sub_title }}</p>
                    <p class="article_show_body">{!! nl2br(e($post->body)) !!}</p>
                    <div class="article_show_post_user">
                        <a href="{{ route('user.show', ['user' => $post->user->id]) }}" class="article_show_post_user_name">投稿者：<span>{{ $post->user->name }}</span></a>
                    </div>
                </div>
                <div class="article_show_config">
                    @if (auth()->user()->id == $post->user->id)
                    <button class="article_show_config_btn">･･･</button>
                    {{-- モーダルここから --}}
                    <div class="article_show_config_menu">
                        <div class="article_show_edit article_show_config_menu_btn">
                            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="article_show_edit_btn">編集</a>
                        </div>
                        <div class="article_show_delete article_show_config_menu_btn">
                            <form action="{{ route('post.destroy',  ['post' => $post->id]) }}" class="article_show_delete_form" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="article_show_delete_btn" type="submit" value="削除">
                            </form>
                        </div>
                    </div>
                    {{-- モーダルここまで --}}
                    @endif
                </div>
            </div>
            <div class="article_show_chat_btn_area">
                <a href="{{ route('chat.index', ['user' => $post->user->id, 'post' => $post->id]) }}" class="article_show_chat_btn">コメントする</a>
            </div>
        </div>
    </div>
</section>
@endsection
