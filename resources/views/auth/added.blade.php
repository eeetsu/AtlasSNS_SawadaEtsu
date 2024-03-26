@extends('layouts.logout')

@section('content')
<div class="logout-form">
  <img src="images/atlas.png" width="150" higtht="25">
  <p class="p-title-first">Social Network Service</p>
    <div id="clear">
        <div class="back-color">
            @if(session('username'))
                <p class="username">

                    {{ session('username') }}さん
                </p>
            @endif
            <p class="p-title">ようこそ！AtlasSNSへ！</p>
            <div class="inner">
                <p>ユーザー登録が完了しました。</p>
                <p>早速ログインしてみましょう。</p>
            </div>
            <div class="btn-center">
                <p class="btn"><a href="/top" class="btn btn-danger">ログイン画面へ</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
