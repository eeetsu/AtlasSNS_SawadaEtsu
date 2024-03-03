@extends('layouts.login')

@section('content')

<div class="follow-list">
  <div class="follow-icons">
    @foreach($follows as $follow)
     @if($follow->id !== Auth::id())
        <img src="{{ asset($follow->images) }}" alt="follow-icon">
     @endif
    @endforeach
  </div>

  <div class="follow-posts">
    @foreach($follows as $follow)
     @if($follow->id !== Auth::id())
        @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
            <div class="post">
                <a href="{{ route('follow.profile', ['user_id' => $follow->id]) }}" class="btn">
                    <img src="{{ asset($follow->images) }}" alt="follow-icon">
                </a>
                <p>{{ $post->user->username }}</p>
                <h4>{{ $post->post }}</h4>
                <p>投稿日時：{{ $post->created_at }}</p>
            </div>
        @endforeach
     @endif
    @endforeach
  </div>

</div>

@endsection
