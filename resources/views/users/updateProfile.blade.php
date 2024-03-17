@extends('layouts.login')

@section('content')

<div class="container">
  <div class="update">
    {!! Form::open(['url'=>'/profile/update','enctype'=>'multipart/form-data', 'method'=>'POST']) !!}
    @csrf
    {{Form::hidden('id',Auth::user()->id)}}
    @if(Auth::user()->images)
<img src="{{ asset('storage/images/' . Auth::user()->images) }}">
@else
<img src="{{ asset('storage/images/' . Auth::user()->image) }}">
@endif
    <div class="update-form">
      <div class="update-block">
       <!--ユーザー名-->
       <label for="name">user name</label>
       <!--ログインユーザーの情報をvalueを使って初期値に設定-->
       <input type="text" name="username" value="{{Auth::user()->username}}">
       <!-- バリデーションエラーメッセージを表示 -->
       @error('username')
        <span class="text-danger">{{ $message }}</span>
       @enderror
      </div>
      <div class="update-block">
      <!--メールアドレス-->
      <label for="mail">mail address</label>
      <input type="email" name="mail" value="{{Auth::user()->mail}}">
      <!-- バリデーションエラーメッセージを表示 -->
       @error('mail')
        <span class="text-danger">{{ $message }}</span>
       @enderror
      </div>
      <div class="update-block">
        <!--パスワード-->
          <label for="password">new password</label>
          <input type="password" name="password" value="" >
          <!-- バリデーションエラーメッセージを表示 -->
         @error('password')
          <span class="text-danger">{{ $message }}</span>
         @enderror
      </div>
      <div class="update-block">
        <!--パスワード確認用-->
          <label for="password_confirmation">password confirmation</label>
          <input type="password" name="password_confirmation" value="" >
          <!-- バリデーションエラーメッセージを表示 -->
          @error('password_confirmation')
           <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
    <div class="update-block">
      <!--自己紹介-->
     <label for="name">bio</label>
     <input type="text" name="bio" value="{{Auth::user()->bio}}">
      <!-- バリデーションエラーメッセージを表示 -->
       @error('bio')
        <span class="text-danger">{{ $message }}</span>
       @enderror
    </div>
    <div class="update-block">
      <!--アイコン画像アップロード-->
      <label for="name">icon image</label>
      <input type="file" name="images">
      <!-- バリデーションエラーメッセージを表示 -->
        @error('images')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!--押したらデータが更新されるページへ--><!--ログインしているユーザーのidを取得-->
    <input type="submit" class="btn btn-danger">
    {{Form::token()}}
    {!! Form::close() !!}
    </div>

  </div>
</div>

@endsection
