@extends('layouts.posts')

@section('content')
<ul class="article_lists">
    <li class="article_list">
        <h3 class="article_list_title"><a href="{{ route('posts.index') }}">空飛ぶ人力車開発プロジェクトチーム募集</a></h3>
        <p class="article_list_sub_title">人力車のイメージ、設計図はあります。開発人員を募集してます。</p>
        <div class="article_list_image"></div>
        <div class="article_list_tag">
            <span class="article_list_tag_icon">タグ：</span>
            <a class="article_list_tag_name" href="#">ソフトウェア開発</a>
        </div>
        <p class="article_list_post_time"><time>2022/6/15</time></p>
    </li>
</ul>
@endsection
