@extends('layouts.logout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register', 'method' => 'POST']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input', 'name' => 'username']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input', 'name' => 'mail']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input', 'name' => 'password']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input', 'name' => 'password_confirmation']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
