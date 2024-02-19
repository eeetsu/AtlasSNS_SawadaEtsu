@extends('layouts.login')

@section('content')

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div>
        <textarea name="post" id="post" placeholder="投稿内容を入力してください." maxlength="150"></textarea>
    </div>
    <!-- ログインユーザーのユーザーアイコン表示 -->
    <img src="{{ Auth::user()->icon }}" alt="icon">
    <button type="submit">投稿</button>
</form>

<!-- 自分の投稿一覧表示 -->
@foreach($posts as $post)
    <div>
        <!-- 投稿者名の表示 -->
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
        <!-- 編集ボタン -->
        <form method="POST" action="{{ route('posts.edit') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button type="submit">編集</button>
        </form>
    </div>
@endforeach

@endsection
