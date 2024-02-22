@extends('layouts.login')

@section('content')

<div class="follower-list">
  <div class="follower-icons">
    @foreach($followers as $follower)
      <img src="{{ $follower->images }}" alt="follower-icon">
    @endforeach
  </div>

  <div class="follower-posts">
    @foreach($followers as $follower)
    @foreach($follower->posts()->orderBy('created_at', 'desc')->get() as $post)
        <div class="post">
            <h4>{{ $post->post }}</h4>
            <p>{{ $post->user->username }}</p>
            <p>投稿日時：{{ $post->created_at }}</p>
        </div>
    @endforeach
@endforeach
  </div>

</div>

@endsection
