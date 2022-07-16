@extends('layouts.app')

@section('content')
<section class="search_section">
    <div class="container search_container">
        <label class="search_title" for="search">キーワード検索</label>
        <form class="search_form" action="{{ route('posts.index') }}">
            <input class="search_input" id="search" type="text" name="search" placeholder="検索したいキーワードを入力してください">
            <button class="search_btn" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <label class="search_title" for="tag">タグ検索</label>
        <form class="search_form" action="{{ route('posts.index') }}">
            <input class="search_input" id="tag" type="text" name="tag" placeholder="検索したいタグを入力してください">
            <button class="search_btn" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
</section>
@endsection
