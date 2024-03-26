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
<div class="logout-form">
<h2 class="atlas">New user registration</h2>

<div class="back-color">
<p class="p-label">user name</p>
{{ Form::text('username',null,['class' => 'input', 'name' => 'username']) }}

<p class="p-label">meil address</p>
{{ Form::text('mail',null,['class' => 'input', 'name' => 'mail']) }}

<p class="p-label">password</p>
{{ Form::text('password',null,['class' => 'input', 'name' => 'password']) }}

<p class="p-label">password confirmation</p>
{{ Form::text('password_confirmation',null,['class' => 'input', 'name' => 'password_confirmation']) }}

{{ Form::submit('Registration',['class' => 'btn btn-danger']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>
</div>
</div>
{!! Form::close() !!}


@endsection
