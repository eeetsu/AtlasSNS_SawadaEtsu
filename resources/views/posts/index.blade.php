@extends('layouts.login')

@section('content')

<div class="abc">
    <form method="POST" action="{{ route('posts.store') }}" class="line">
        <div>
            @csrf
            <!-- ログインユーザーのユーザーアイコン表示 -->
            @if(Auth::user()->images)
                <img src="{{ asset('storage/images/' . Auth::user()->images) }}" width="64" height="64" style="border-radius: 50%">
                @else
                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" width="64" height="64" style="border-radius: 50%">
            @endif
        </div>
        <!-- ログインユーザーの投稿欄 -->
            <div>
                <textarea name="post" id="post" placeholder="投稿内容を入力してください." maxlength="150"></textarea>
            </div>
        <button type="submit" class="btn_btn-post"><img src="{{ asset('images/post.png') }}" width="32" height="32"></button>
    </form>


  <!-- ログインユーザーの投稿一覧表示 -->
    <div class="login-user-posts">
        @if ($posts->count() > 0)
            <!-- 投稿者名、投稿内容の表示 -->
            @php
            $latestPost = $posts->first();
            @endphp
            <div class="user-post-second">
                <div class="post-content">
                    <img src="{{ asset('storage/images/' . Auth::user()->images) }}" width="64" height="64" style="border-radius: 50%">
                    <div class="post-info">
                        <p>{{ $latestPost->user->username }}</p>
                        <p>{{ $latestPost->post }}</p>
                    </div>
                </div>
                <p class="post-time">投稿日時：{{ $latestPost->user->created_at }}</p>
            </div>
            <div class="btn-primary-danger">
                <table>
                    <!-- 編集ボタン -->
                    <button class="btn post-primary js-modal-open" post="{{ $latestPost->post }}" post_id="{{ $latestPost->id }}"><img src="{{ asset('images/edit.png') }}" width="32" height="32"></button>

                    <!-- モーダル -->
                    <div class="modal js-modal">
                        <div class="modal_bg">
                            <div class="modal_content">
                                <form method="POST" action="{{ route('posts.update', ['post_id' => $latestPost->id]) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <textarea name="post" id="edited_post" maxlength="150">{{ $latestPost->post }}</textarea>
                                </form>
                                <img src="{{ asset('images/edit.png') }}" width="32" height="32" type="submit">
                            </div>
                        </div>
                    </div>

                    <!-- 削除ボタン -->
                    <form method="POST" action="{{ route('posts.destroy', ['post_id' => $latestPost->id]) }}" class="line-second">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                            <img class="normal-img" src="{{ asset('images/trash-h.png') }}" width="32" height="32">
                            <img class="hover-img" src="{{ asset('images/trash.png') }}" width="32" height="32">
                        </button>
                    </form>
                </table>
            </div>
        @endif
    </div>



   <!-- 投稿一覧を表示 -->
    <div class="follow-list"></div>
    <div class="follow-icons"></div>

    <div class="follow-posts">
        @foreach($follows as $follow)
            @foreach($follow->posts()->orderBy('created_at', 'desc')->get() as $post)
                <div class="post-second">
                    <div class="post-content">
                        <img src="{{ asset('storage/images/' . $follow->images) }}" width="64" height="64" style="border-radius: 50%">
                        <div class="post-info">
                            <p class="p-username">{{ $post->user->username }}</p>
                            <p class="p-post">{{ $post->post }}</p>
                        </div>
                        <p class="post-time">投稿日時：{{ $post->created_at }}</p>
                    </div>
                </div>
            @endforeach
        @endforeach



        <!-- ログインユーザーの投稿を表示 -->
        @foreach($posts as $post)
            <div class="post-user">
                <div>
                    <div class="post-content">
                        <img src="{{ asset('storage/images/' . Auth::user()->images) }}" width="64" height="64" style="border-radius: 50%">
                        <div class="post-info">
                            <p class="p-username">{{ $post->user->username }}</p>
                            <p class="p-post">{{ $post->post }}</p>
                        </div>
                    </div>
                    <p class="post-time">投稿日時：{{ $post->created_at }}</p>
                </div>
               <div class="btn-primary-danger">
                <table>
                    <!-- 編集ボタン -->
                    <button class="btn post-primary js-modal-open" post="{{ $latestPost->post }}" post_id="{{ $latestPost->id }}"><img src="{{ asset('images/edit.png') }}" width="32" height="32" class="post-primary"></button>

                    <!-- モーダル -->
                    <div class="modal js-modal">
                        <div class="modal_bg">
                            <div class="modal_content">
                                <form method="POST" action="{{ route('posts.update', ['post_id' => $latestPost->id]) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <textarea name="post" id="edited_post" maxlength="150">{{ $latestPost->post }}</textarea>
                                    <button type="submit" class="post-primary"><img src="{{ asset('images/edit.png') }}" width="32" height="32"></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- 削除ボタン -->
                    <form method="POST" action="{{ route('posts.destroy', ['post_id' => $latestPost->id]) }}" class="line-second">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                            <img class="normal-img" src="{{ asset('images/trash-h.png') }}" width="32" height="32">
                            <img class="hover-img" src="{{ asset('images/trash.png') }}" width="32" height="32">
                        </button>
                    </form>
                </table>
               </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
