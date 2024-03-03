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
            <!-- ↓この記述で繋げる -->
            <script src="{{ asset('js/script.js') }}"></script>
            <script src="/public/js/script.js"></script>
</head>
<body>
    <header>
        <div id="head">

             <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
            <div class="nav-open">
                 <!-- $user->usernameで名前カラムを渡す -->
                 <!-- アコーディオンメニュー -->
                 <p>{{ Auth::user()->username }}さん</p>
                 <nav>
                     <div class="accordion-container">
                         <button href="javascript:void(0);" class="menu-btn"></button>
                         <img src="{{ asset('images/icon1.png') }}">
                         <div class="accordion-menu-container">
                         <div class="accordion-menu">
                             <ul>
                                 <li><a href="/top">HOME</a></li>
                                 <li><a href="/profile/update">プロフィール編集</a></li>
                                 <li><a href="/logout">ログアウト</a></li>
                             </ul>
                        </div>
                    </div>
                </nav>
                    @if(Auth::user()->images=="dawn.png")
                    <img src="{{ asset('images/icon1.png') }}">
                    @else
                    @endif
            </header>
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
                        <p class="btn"><a href="{{ asset('/follow-list') }}">フォローリスト</a></p>
                        <div>
                            <p>フォロワー数</p>
                            <p>{{ count(Auth::user()->followers ?? []) }}名</p>
                        </div>
                        <p class="btn"><a href="{{ asset('/follower-list') }}">フォロワーリスト</a></p>
                    </div>
                    <p class="btn"><a href="{{ asset('/search') }}">ユーザー検索</a></p>
                </div>
            </div>

            <footer>
            </footer>

        </body>
        </html>
