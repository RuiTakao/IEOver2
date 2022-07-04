@extends('layouts.auth')

@section('content')
<form action="{{ route('register') }}" method="post" class="auth_form">
    @csrf
    <input type="text" name="name" id="name" placeholder="名前">
    <input type="email" name="email" id="email" placeholder="メールアドレス">
    <input type="password" name="password" id="password" placeholder="パスワード">
    <input  type="password" name="password_confirmation" id="password-confirm" required autocomplete="new-password">
    <input type="submit" value="ログイン">
</form>
<div class="change_auth">
    <a href="{{ route('login') }}" class="change_auth_link">新規登録はこちら</a>
</div>
@endsection
