@extends('layouts.login')

@section('content')


<div class="follower-posts">
    @foreach(Auth::user()->followers as $follower)
        @foreach($follower->posts()->orderBy('created_at', 'desc')->get() as $post)
            <div class="post">
                <a href="{{ route('follower.profile', ['user_id' => $follower->id]) }}" class="btn" img src="{{ $follower->images }}" alt="follow-icon"><img src="{{ asset($follower->images) }}" alt="follower-icon"></a>
                <p>{{ $post->user->username }}</p>
                <h4>{{ $post->post }}</h4>
                <p>投稿日時：{{ $post->created_at }}</p>
            </div>
        @endforeach
    @endforeach
</div>

@endsection
