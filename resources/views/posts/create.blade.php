@extends('layouts.posts')

@section('content')
<form action="{{ route('post.store') }}" method="post">
    @csrf
    <input type="text" name="title">
    <input type="text" name="sub_title">
    <input type="text" name="body">
    <input type="submit" value="投稿する">
</form>
<a href="{{ route('posts.index') }}">戻る</a>
@endsection
