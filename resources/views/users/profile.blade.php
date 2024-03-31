@extends('layouts.login')

@section('content')

<div class="abc">
    <div class="line">
        <!-- アイコンユーザーアイコンの表示 -->
        <div>
          <img src="{{ asset('storage/images/' . $user->images) }}" alt="">
        </div>
        <!-- アイコンユーザー名 -->
        <div class="user-profile">
            <div class="name-bio">
                <!-- アイコンユーザーの名前 -->
                <h4 class="h-user-name">name</h4>
                <!-- アイコンユーザーの自己紹介文 -->
                <h4 class="h-bio">bio</h4>
            </div>

            <div class="name-bio">
                <!-- アイコンユーザーの名前 -->
                <h4 class="h-user-name">{{ $user->username }}</h4>
                <!-- アイコンユーザーの自己紹介文 -->
                <h3 class="h-bio">{{ $user->bio }}</h3>
            </div>
        </div>
        <!-- フォロー機能 -->
        <div class="btn-follow">
            @if(Auth::user() && Auth::user()->id !== $user->id)
            @if(Auth::user()->followings->contains('id', $user->id))
                <form action="{{ route('unfollow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
            @endif
            @endif
        </div>
    </div>

    <!-- アイコンのユーザーの投稿一覧履歴 -->
    <div class="follow-posts">
        @foreach($user->posts()->orderBy('created_at', 'desc')->get() as $post)
                <div class="post-second">
                  <div class="post-content">
                    <img src="{{ asset('storage/images/' . $user->images) }}" alt="">
                    <div class="post-info">
                        <p>{{ $user->username }}</p>
                        <p>{{ $post->post }}</p>
                    </div>
                   <p class="post-time-second">投稿日時：{{ $post->created_at }}</p>
                  </div>
                </div>
        @endforeach
    </div>
</div>
@endsection
