@extends('layouts.login')

@section('content')
<div class="container">
    <!-- ユーザーアイコンの表示 -->
    <img src="{{ $user->images }}">

    <!-- ユーザー名 -->
    <h2>name  {{ $user->username }}</h2>

    <!-- ユーザーの自己紹介文 -->
    <h2>bio  {{ $user->bio }}</h2>

    <!-- フォロー機能 -->
    @if(Auth::user() && Auth::user()->id !== $user->id)
        @if(Auth::user()->followings->contains('id', $user->id))
            <form action="{{ route('unfollow', $user->id) }}" method="POST">
                @csrf
                <button type="submit">フォロー解除</button>
            </form>
        @else
            <form action="{{ route('follow', $user->id) }}" method="POST">
                @csrf
                <button type="submit">フォローする</button>
            </form>
        @endif
    @endif

    <!-- ログインユーザーがフォローしたユーザーの投稿一覧 -->
    <div class="follow-posts">
    @foreach($follows as $follow)
      @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
        <div class="post">
            <p>{{ $follow->username }}</p>
            <h2>{{ $follow->bio }}</h2>
            <h4>{{ $post->post }}</h4>
            <p>投稿日時：{{ $post->created_at }}</p>
        </div>
      @endforeach
    @endforeach
    </div>
</div>
@endsection
