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
    <form method="POST" action="{{ route('posts.update', ['post_id' => $post->id]) }}">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <textarea name="post" id="edited_post" maxlength="150">{{ $post->post }}</textarea>
        <button type="submit">更新</button>
    </form>
    <!-- 削除ボタン -->
    <form method="POST" action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">削除</button>
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
