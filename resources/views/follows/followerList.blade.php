@extends('layouts.login')

@section('content')

<div class="container">
  <div class="follower-list">
    <div class="follower-icons"></div>

      <!-- フォロワーユーザーアイコン表示 -->
      <div class="follower-list-icon">
          <h3>Follower List</h3>
          <div class="follower-posts-icon">
              @foreach(Auth::user()->followers as $follower)
                  @php
                      // フォロワーの最新の投稿を取得
                      $latestPost = $follower->posts()->orderBy('created_at', 'desc')->first();
                  @endphp
                  @if ($latestPost)
                      <div class="post-item">
                          <a href="{{ route('follower.profile', ['user_id' => $follower->id]) }}" class="btn" enctype="multipart/form-data">
                              <img src="{{ asset('storage/images/' . $follower->images) }}" alt="">
                          </a>
                      </div>
                  @endif
              @endforeach
          </div>
      </div>
      <div class="follower-posts">
          @foreach(Auth::user()->followers as $follower)
              @foreach($follower->posts()->orderBy('created_at', 'desc')->get() as $post)
                  <div class="post-second">
                    <div class="post-content">
                      <a href="{{ route('follower.profile', ['user_id' => $follower->id]) }}" class="btn" enctype="multipart/form-data">
                      <img src="{{ asset('storage/images/' . $follower->images) }}" alt="">
                      </a>
                      <div class="post-info">
                          <p class="p-username-second">{{ $post->user->username }}</p>
                          <p class="p-post-second">{{ $post->post }}</p>
                      </div>
                      <p class="post-time-second">投稿日時：{{ $post->created_at }}</p>
                    </div>
                  </div>
              @endforeach
          @endforeach
      </div>
  </div>
</div>
@endsection
