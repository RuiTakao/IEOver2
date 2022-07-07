@extends('layouts.posts')

@section('content')
<form action="{{ route('post.store') }}" method="post">
    @csrf
    <input type="text" name="title">
    <input type="text" name="sub_title">
    <textarea name="body" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="投稿する">
</form>
<a href="{{ route('posts.index') }}">戻る</a>
@endsection
