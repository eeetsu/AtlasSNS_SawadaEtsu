@extends('layouts.login')

@section('content')

<div class="container">
<!-- 検索フォームへ飛ぶための追加ボタンを設置！ -->
    <form action="/search" method="get">
        @csrf
        <input type="text" name="keyword" class="form" placeholder="ユーザー名" value="{{ $keyword ?? '' }}">
        <button type="submit" class="btn btn-search"><img src="{{ asset('images/search.png') }}" width="32" height="32"></button>
    </form>
    <!-- 検索ワードが空でない場合のみ表示 -->
    @if (!empty($keyword))
    <div>検索ワード： {{ $keyword }}</div>
    @endif

    <div class="user-icons">
        @foreach($users as $user)
            <img src="{{ asset('storage/images/' . $user->images) }}" alt="">
            <span>{{ $user->username }}</span>
            @if(Auth::user() && Auth::user()->id !== $user->id)
                @if(Auth::user()->followings->contains('id', $user->id))
                <form action="{{ route('unfollow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
                @else
                <form action="{{ route('follow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
                @endif
            @endif
        @endforeach
    </div>
</div>

@endsection
