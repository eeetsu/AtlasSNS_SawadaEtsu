@extends('layouts.login')

@section('content')


<div class="follow-list">
  <div class="follow-icons">
</div>


<!-- フォローユーザーアイコン表示 -->
<div class="follow-list-icon">
 <h3>Folow List</h3>
  <div class="follow-posts-icon">
      @foreach($follows as $follow)
          @if($follow->id !== Auth::id())
              @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
                  <div class="post">
                      <a href="{{ route('follow.profile', ['user_id' => $follow->id]) }}" class="btn" enctype="multipart/form-data">
                          <img src="{{ asset('storage/images/' . $follow->images) }}" alt="">
                      </a>
                  </div>
              @endforeach
          @endif
      @endforeach
  </div>
</div>



  <div class="follow-posts">
    @foreach($follows as $follow)
     @if($follow->id !== Auth::id())
        @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
            <div class="post">
              <a href="{{ route('follow.profile', ['user_id' => $follow->id]) }}" class="btn" enctype="multipart/form-data">
                  <img src="{{ asset('storage/images/' . $follow->images) }}" alt="">
              </a>
                <p>{{ $post->user->username }}</p>
                <h4>{{ $post->post }}</h4>
                <p class="post-time">投稿日時：{{ $post->created_at }}</p>
            </div>
        @endforeach
     @endif
    @endforeach
  </div>

</div>

@endsection
