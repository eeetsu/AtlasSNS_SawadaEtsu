@extends('layouts.login')

@section('content')

<div class="container">
<!-- 検索フォームへ飛ぶための追加ボタンを設置！ -->
    <form action="/search" method="get">
        @csrf
        <input type="text" name="keyword" class="form" placeholder="ユーザー名" value="{{ $keyword ?? '' }}">
        <button type="submit" class="btn btn-success">検索ロゴ</button>
    </form>

    <div class="user-icons">
        @foreach($users as $user)
            <img src="{{ $user->images }}" alt="user-icon">
            <span>{{ $user->username }}</span>
            @if($user->is_followed)
                <form action="/unfollow/{{$user->id}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            @else
                <form action="/follow/{{$user->id}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
            @endif
        @endforeach
    </div>
</div>

@endsection
