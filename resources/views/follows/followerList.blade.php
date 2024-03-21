@extends('layouts.login')

@section('content')



<!-- フォロワーユーザーアイコン表示 -->
<div class="follower-list-icon">
  <h3>Folower List</h3>
    <div class="follower-posts-icon">
        @foreach(Auth::user()->followers as $follower)
          @foreach($follower->posts()->orderBy('created_at', 'desc')->get() as $post)
            <div class="post-item">
                <a href="{{ route('follower.profile', ['user_id' => $follower->id]) }}" class="btn" enctype="multipart/form-data">
                    <img src="{{ asset('storage/images/' . $follower->images) }}" alt="">
                </a>
            </div>
          @endforeach
        @endforeach
    </div>
</div>

<div class="follower-posts">
    @foreach(Auth::user()->followers as $follower)
        @foreach($follower->posts()->orderBy('created_at', 'desc')->get() as $post)
            <div class="post">
                <a href="{{ route('follower.profile', ['user_id' => $follower->id]) }}" class="btn" enctype="multipart/form-data">
                 <img src="{{ asset('storage/images/' . $follower->images) }}" alt="">
                </a>
                <p>{{ $post->user->username }}</p>
                <h4>{{ $post->post }}</h4>
                <p class="post-time">投稿日時：{{ $post->created_at }}</p>
            </div>
        @endforeach
    @endforeach
</div>

@endsection
