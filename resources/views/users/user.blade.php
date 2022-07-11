@extends('layouts.app')

@section('content')

<section class="profile_section">
    <div class="container">
        <div class="profile_content">
            <div class="profile_head">
                <div class="user_icon"></div>
                <div class="user_status">
                    <p class="user_name">{{ $user->name }}</p>
                    <p class="user_job">システムエンジニア</p>
                </div>
            </div>
            <div class="profile_body">
                <p class="user_profile">都内でJavaエンジニアとして働いております。<br>メカニックが好きでメカニック大会にも毎年、出場しています。<br>本職のプログラミングスキルを活かしながら、皆様のアイデア実現の為の力になれたらと思います。<br>よろしくお願いします。</p>
            </div>
        </div>
    </div>
</section>
<section class="posts_section">
    <div class="container">
        <ul class="article_lists">
            @foreach ($posts as $post)
            <li class="article_list">
                <h3 class="article_list_title"><a href="{{ route('post.show', ['user' => $post->user->id, 'post' => $post->id]) }}">{{ $post->title }}</a></h3>
                <p class="article_list_sub_title">{{ $post->sub_title }}</p>
                <div class="article_list_image"></div>
                <div class="article_list_tag">
                    <span class="article_list_tag_icon">タグ：</span>
                    <a class="article_list_tag_name" href="#">ソフトウェア開発</a>
                </div>
                <p class="article_list_post_time"><time>{{ $post->created_at->format('Y年n月j日') }}</time></p>
            </li>
            @endforeach
        </ul>
    </div>
</section>

@endsection
