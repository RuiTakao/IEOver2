@extends('layouts.posts')

@section('content')
<form action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
    @csrf
    @method('PATCH')
    <input type="text" name="title" value="{{ old('title', $post->title) }}">
    <input type="text" name="sub_title" value="{{ old('sub_title', $post->sub_title) }}">
    <textarea name="body" id="" cols="30" rows="10" value="{{ old('body', $post->body) }}"></textarea>
    <input type="submit" value="編集する">
</form>
<a href="{{ route('posts.index') }}">戻る</a>
@endsection
