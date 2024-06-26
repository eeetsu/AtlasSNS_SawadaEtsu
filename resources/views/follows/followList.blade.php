@extends('layouts.login')

@section('content')

<div class="abc">
  <div class="follow-list">
    <div class="follow-icons"></div>


    <!-- フォローユーザーアイコン表示 -->
    <div class="follow-list-icon">
        <h3>Follow List</h3>
        <div class="follow-posts-icon">
            @foreach($follows as $follow)
                @if($follow->id !== Auth::id())
                    @php
                        $latest_post = $follow->posts()->orderByDesc('created_at')->first();
                    @endphp
                    @if($latest_post)
                        <div class="post-item">
                            <a href="{{ route('follow.profile', ['user_id' => $follow->id]) }}" class="btn" enctype="multipart/form-data">
                                <img src="{{ asset('storage/images/' . $follow->images) }}" alt="" width="64" height="64" style="border-radius: 50%">
                            </a>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>



    <div class="follow-posts">
      @foreach($follows as $follow)
        @if($follow->id !== Auth::id())
          @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
              <div class="post-second">
                <div class="post-content">
                  <a href="{{ route('follow.profile', ['user_id' => $follow->id]) }}" class="btn" enctype="multipart/form-data">
                      <img src="{{ asset('storage/images/' . $follow->images) }}" alt="" width="64" height="64" style="border-radius: 50%">
                  </a>
                  <div class="post-info">
                    <p class="p-username-second">{{ $post->user->username }}</p>
                    <p class="p-post-second">{{ $post->post }}</p>
                  </div>
                  <p class="post-time-second">投稿日時：{{ $post->created_at }}</p>
                </div>
              </div>
          @endforeach
        @endif
      @endforeach
    </div>
  </div>
</div>

@endsection
