@extends('layouts.app')

@section('content')
<section class="search_section">
    <div class="container search_container">
        <label class="search_title" for="search">キーワード検索</label>
        <form class="search_form" action="{{ route('posts.index') }}">
            <input class="search_input" id="search" type="text" name="search" placeholder="検索したいキーワードを入力してください">
            <input class="search_btn" type="submit" value="検索">
        </form>
        <label class="search_title" for="tag">タグ検索</label>
        <form class="search_form" action="{{ route('posts.index') }}">
            <input class="search_input" id="tag" type="text" name="tag" placeholder="検索したいタグを入力してください">
            <input class="search_btn" type="submit" value="検索">
        </form>
    </div>
</section>
@endsection
