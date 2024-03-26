@extends('layouts.login')

@section('content')

<div class="container">
  <div class="update">
        <div class="update-form-icon">
          {!! Form::open(['url'=>'/profile/update','enctype'=>'multipart/form-data', 'method'=>'POST']) !!}
            @csrf
            {{Form::hidden('id',Auth::user()->id)}}
            @if(Auth::user()->images)
              <img src="{{ asset('storage/images/' . Auth::user()->images) }}">
            @else
              <img src="{{ asset('storage/images/' . Auth::user()->image) }}">
            @endif
        </div>

      <div class="update-form">

        <div class="update-block">
          <!--ユーザー名-->
          <div class="update-label">
            <label for="name">user name</label>
          </div>
          <!--ログインユーザーの情報をvalueを使って初期値に設定-->
          <div>
            <input type="text" name="username" value="{{Auth::user()->username}}" class="update-block-form">
          </div>
          <!-- バリデーションエラーメッセージを表示 -->
          @error('username')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="update-block">
          <!--メールアドレス-->
          <div class="update-label">
            <label for="mail">mail address</label>
          </div>
          <input type="email" name="mail" value="{{Auth::user()->mail}}" class="update-block-form">
          <!-- バリデーションエラーメッセージを表示 -->
          @error('mail')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="update-block">
          <!--パスワード-->
          <div class="update-label">
            <label for="password">new password</label>
          </div>
          <input type="password" name="password" value="" class="update-block-form">
          <!-- バリデーションエラーメッセージを表示 -->
          @error('password')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="update-block">
          <!--パスワード確認用-->
          <div class="update-label">
            <label for="password_confirmation">password confirmation</label>
          </div>
          <input type="password" name="password_confirmation" value="" class="update-block-form">
        </div>
          <!-- バリデーションエラーメッセージを表示 -->
          @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
          @enderror


        <div class="update-block">
          <!--自己紹介-->
          <div class="update-label">
            <label for="name">bio</label>
          </div>
          <input type="text" name="bio" value="{{Auth::user()->bio}}" class="update-block-form">
        </div>
          <!-- バリデーションエラーメッセージを表示 -->
          @error('bio')
            <span class="text-danger">{{ $message }}</span>
          @enderror

        <div class="update-block">
          <!--アイコン画像アップロード-->
          <div class="update-label">
            <label for="name">icon image</label>
          </div>
          <input type="file" name="images">
        </div>
          <!-- バリデーションエラーメッセージを表示 -->
          @error('images')
            <span class="text-danger">{{ $message }}</span>
          @enderror

        <!--押したらデータが更新されるページへ--><!--ログインしているユーザーのidを取得-->
        <div class="update-btn">
          <button type="submit" class="btn btn-danger">　　　更新　　　</button>
        </div>
        {{Form::token()}}
       {!! Form::close() !!}
      </div>
  </div>
</div>

@endsection
