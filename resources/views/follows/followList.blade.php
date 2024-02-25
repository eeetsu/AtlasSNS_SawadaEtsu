@extends('layouts.login')

@section('content')

<div class="follow-list">
  <div class="follow-icons">
  </div>

  <div class="follow-posts">
    @foreach($follows as $follow)
    @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
        <div class="post">
            <a href="{{ route('follow.profile', ['user_id' => $follow->id]) }}" class="btn" img src="{{ $follow->images }}" alt="follow-icon"><img src="{{ $follow->images }}" ></a>
            <p>{{ $post->user->username }}</p>
            <h4>{{ $post->post }}</h4>
            <p>投稿日時：{{ $post->created_at }}</p>
        </div>
    @endforeach
@endforeach
  </div>

</div>

@endsection
