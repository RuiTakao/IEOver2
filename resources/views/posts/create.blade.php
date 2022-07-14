@extends('layouts.app')

@section('content')
<section class="article_create_section">
    <div class="container article_create_container">
        <form class="article_create_form" action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="article_create_form_content">
                <div class="idea-title_content">
                    <label for="title">アイデアのタイトル</label>
                    <input type="text" id="title" name="title" placeholder="アイデアのタイトルを入力してください">
                </div>
                <div class="idea-sub-title_content">
                    <label for="sub_title">アイデアの概要（一覧ページに表示されます）</label>
                    <textarea name="sub_title" id="sub_title" cols="30" rows="10" placeholder="アイデア一覧ページに表示される内容です"></textarea>
                </div>
                <div class="idea-body_content">
                    <label for="body">アイデアの詳細</label>
                    <textarea name="body" id="body" cols="30" rows="10" placeholder="アイデアの詳細を入力してください"></textarea>
                </div>
            </div>
            <div class="article_create_btn">
                <input type="submit" value="投稿する">
            </div>
        </form>
    </div>
</section>
@endsection
