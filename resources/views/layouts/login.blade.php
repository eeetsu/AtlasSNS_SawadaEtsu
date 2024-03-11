<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="width=device-width,initial-scale=1" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="{{ asset('images/atlas.png') }}" sizes="16x16" type="image/png" />
    <link rel="icon" href="{{ asset('images/atlas.png') }}" sizes="32x32" type="image/png" />
    <link rel="icon" href="{{ asset('images/atlas.png') }}" sizes="48x48" type="image/png" />
    <link rel="icon" href="{{ asset('images/atlas.png') }}" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/atlas.png') }}" />
    <!--OGPタグ/twitterカード-->
    <!-- Javascript・jQueryのファイルリンク -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- scriptの読み込み -->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- <script src="/public/js/script.js"></script> -->
  <!-- BootstrapのCSS読み込み -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- jQuery読み込み -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- BootstrapのJS読み込み -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <header>
       <div id="head">
             <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
         <div class="nav-open">
             <p class="header-p-white">{{ Auth::user()->username }}さん</p>
            <nav>
                <button class="menu-btn"></button>
                <img src="{{ asset('images/icon1.png') }}">
                <!-- アコーディオンメニュー -->
                <div class=“accordion” >
                    <div class=“accordion-header”>
                        <button class="menu-btn"></button>
                        <!-- クリックして表示される文章 -->
                        <div class=“accordion-content”>
                            <ul>
                                <li class="li-first"><a href="/top"><p class="header-p-gray">HOME</p></a></li>
                                <li class="li-second"><a href="/profile/update"><p class="header-p-white">プロフィール編集</p></a></li>
                                <li class="li-first"><a href="/logout"><p class="header-p-gray">ログアウト</p></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
         </div>
      </div>
    </header>



        @if(Auth::user()->images=="dawn.png")
        <img src="{{ asset('images/icon1.png') }}">
        @else
        @endif

            <div id="row">
                <div id="container">
                    @yield('content')
                </div >
                <div id="side-bar">
                    <div id="confirm">
                        <p>{{ Auth::user()->username }}さん</p>
                        <div>
                            <p>フォロー数</p>
                            <p>{{ count(Auth::user()->followings ?? []) }}名</p>
                        </div>
                        <p class="btn"><a class="btn btn-primary" href="{{ asset('/follow-list') }}">フォローリスト</a></p>
                        <div>
                            <p>フォロワー数</p>
                            <p>{{ count(Auth::user()->followers ?? []) }}名</p>
                        </div>
                        <p class="btn"><a class="btn btn-primary" href="{{ asset('/follower-list') }}" >フォロワーリスト</a></p>
                    </div>
                    <p class="btn"><a class="btn btn-primary" href="{{ asset('/search') }}">ユーザー検索</a></p>
                </div>
            </div>

            <footer>
            </footer>

        </body>
        </html>
