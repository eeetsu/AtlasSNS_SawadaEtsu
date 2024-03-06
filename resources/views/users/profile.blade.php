@extends('layouts.login')

@section('content')
<div class="container">
    <!-- アイコンユーザーアイコンの表示 -->
    <img src="{{ asset('storage/images/' . $user->images) }}" alt="">
    <!-- アイコンユーザー名 -->
    <h2>name  {{ $user->username }}</h2>

    <!-- アイコンユーザーの自己紹介文 -->
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

    <!-- アイコンのユーザーの投稿一覧履歴 -->
    <div class="follow-posts">
        @foreach($user->posts()->orderBy('created_at', 'desc')->get() as $post)
            <div class="post">
                <img src="{{ asset('storage/images/' . $user->images) }}" alt="">
                <p>{{ $user->username }}</p>
                <h4>{{ $post->post }}</h4>
                <p>投稿日時：{{ $post->created_at }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
