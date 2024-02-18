@extends('layouts.login')

@section('content')

<div class="follow-list">
  <div class="follow-icons">
    @foreach($follows as $follow)
      <img src="{{ $follow->images }}" alt="follow-icon">
    @endforeach
  </div>

  <div class="follow-posts">
    @foreach($follows as $follow)
    @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
        <div class="post">
            <h4>{{ $post->title }}</h4>
            <p>{{ $post->content }}</p>
            <p>投稿日時：{{ $post->created_at }}</p>
        </div>
    @endforeach
@endforeach
  </div>

</div>

@endsection
