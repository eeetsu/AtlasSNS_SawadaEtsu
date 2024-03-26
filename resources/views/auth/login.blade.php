@extends('layouts.logout')

@section('content')
      {!! Form::open(['url' => '/login']) !!}
      <div class="logout-form">
        <img src="images/atlas.png" width="150" higtht="25">
        <p class="p-title-first">Social Network Service</p>

        <div class="back-color">
          <p class="p-title">AtlasSNSへようこそ</p>

            <p class="p-label">mail adress</p>

            {{ Form::text('mail',null,['class' => 'input']) }}

            <p class="p-label">passwod</p>

            {{ Form::password('password',['class' => 'input']) }}

            <div class="btn">
            {{ Form::submit('LOGIN',['class' => 'btn btn-danger']) }}
            </div>

          <p><a href="/register" class="url-line">新規ユーザーの方はこちら</a></p>
        </div>
      </div>
      {!! Form::close() !!}

@endsection
