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
        @endforeach
    </div>
</div>

@endsection
