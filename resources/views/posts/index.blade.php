@extends('layouts.login')

@section('content')

<form method="POST" action="{{ route('posts.store') }}”>
@csrf
    <div>
        <textarea name="post" id="post" placeholder="投稿内容を入力してください。"></textarea>
    </textarea>
    </div>
    <!-- ログインユーザーのユーザーアイコン表示 -->
    <img src="{{ Auth::user()->icon }}" alt="icon">
    <button type="submit">投稿ロゴ</button>
</form>

@endsection
