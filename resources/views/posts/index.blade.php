@extends('layouts.app')

@section('content')
<section class="article_list_section">
    <div class="container">
        <ul class="article_lists">
            @foreach ($posts as $post)
            <li class="article_list">
                <h3 class="article_list_title"><a href="{{ route('post.show', ['user' => $post->user->id, 'post' => $post->id]) }}">{{ $post->title }}</a></h3>
                <p class="article_list_sub_title">{{ $post->sub_title }}</p>
                <div class="article_list_image" style="background-image: url( {{ asset('storage/img/posts/' . $post->post_image) }} );"></div>
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
