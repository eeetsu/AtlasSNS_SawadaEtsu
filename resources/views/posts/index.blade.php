@extends('layouts.login')

@section('content')
<div class="container">
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div>
        <textarea name="post" id="post" placeholder="投稿内容を入力してください." maxlength="150"></textarea>
    </div>
    <!-- ログインユーザーのユーザーアイコン表示 -->
    <img src="{{ Auth::user()->icon }}" alt="icon">
    <button type="submit">投稿</button>
</form>

<!-- ログインユーザーの投稿一覧表示 -->
@foreach($posts as $post)
    <div>
        <!-- 投稿者名、投稿内容の表示 -->
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

<!-- 投稿一覧を表示 -->
  <div class="follow-list">
  <div class="follow-icons">

  </div>

  <div class="follow-posts">
@foreach($follows as $follow)
    @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
        <div class="post">
            <img src="{{ $follow->images }}" alt="follow-icon">
            <h4>{{ $post->post }}</h4>
            <p>{{ $post->user->username }}</p>
            <p>投稿日時：{{ $post->created_at }}</p>
        </div>
    @endforeach
@endforeach
  </div>
</div>
</div>

@endsection
