@extends('layouts.auth')

@section('content')
<form action="{{ route('login') }}" method="post" class="auth_form">
    @csrf
    <input type="email" name="email" placeholder="メールアドレス">
    <input type="password" name="password" placeholder="パスワード">
    <input type="submit" value="ログイン">
</form>
<div class="change_auth">
    <a href="{{ route('register') }}" class="change_auth_link">新規登録はこちら</a>
</div>
@endsection
