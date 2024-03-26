@extends('layouts.logout')

@section('content')
      <!-- 適切なURLを入力してください -->
      {!! Form::open(['url' => '/login']) !!}
      <div class="logout-form">
        <h1 class="atlas">Atlas</h1>
        <p>Social Network Service</p>

        <div class="back-color">
          <p>AtlasSNSへようこそ</p>

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
