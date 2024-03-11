@extends('layouts.login')

@section('content')
<div class="container">
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div>
        <textarea name="post" id="post" placeholder="投稿内容を入力してください." maxlength="150"></textarea>
    </div>
    <!-- ログインユーザーのユーザーアイコン表示 -->
    <img src="{{ asset('images/icon1.png') }}">
    <button type="submit" class="btn btn-post"><img src="{{ asset('images/post.png') }}" width="32" height="32"></button>
</form>



<!-- ログインユーザーの投稿一覧表示 -->
@foreach($posts as $post)
   <div>
    <!-- 投稿者名、投稿内容の表示 -->
    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>

    <!-- 編集ボタン -->
    <button class="btn btn-primary js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('images/edit.png') }}" width="32" height="32" ></button>

    <!-- モーダル -->
    <div class="modal js-modal">
      <div class="modal_bg">
       <div class="modal_content">
           <form method="POST" action="{{ route('posts.update', ['post_id' => $post->id]) }}">
               @csrf
               <input type="hidden" name="_method" value="PUT">
               <textarea name="post" id="edited_post" maxlength="150">{{ $post->post }}</textarea>
               <button type="submit" class="btn btn-primary"><img src="{{ asset('images/edit.png') }}" width="32" height="32" ></button>
           </form>
           <button class="js-modal-close">Close</button>
       </div>
     </div>
   </div>

    <!-- 削除ボタン -->
    <form method="POST" action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger"><img src="{{ asset('images/trash-h.png') }}" width="32" height="32"></button>
    </form>
   </div>
@endforeach




<!-- 投稿一覧を表示 -->
  <div class="follow-list">
  <div class="follow-icons">
  </div>

  <div class="follow-posts">
@foreach($follows as $follow)
    @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
        <div class="post">
            <a href="{{ route('follow.profile', ['user_id' => $follow->id]) }}" class="btn" enctype="multipart/form-data">
             <img src="{{ asset('storage/images/' . $follow->images) }}" alt="">
            </a>
            <h4>{{ $post->post }}</h4>
            <p>{{ $post->user->username }}</p>
            <p>投稿日時：{{ $post->created_at }}</p>
        </div>
    @endforeach
@endforeach
  </div>
</div>
</div>

@endsection
