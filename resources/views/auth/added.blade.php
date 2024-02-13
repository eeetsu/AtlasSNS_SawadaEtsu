@extends('layouts.logout')

@section('content')

<div id="clear">

    @if(session('username'))
        <p class="username">
            {{ session('username') }}さん
        </p>
    @endif
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインしてみましょう。</p>

    <p class="btn"><a href="/top">ログイン画面へ</a></p>
</div>

@endsection
