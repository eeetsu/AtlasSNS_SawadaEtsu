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
    <link rel="icon" href="images/atlas.png" sizes="16x16" type="image/png" />
    <link rel="icon" href="images/atlas.png" sizes="32x32" type="image/png" />
    <link rel="icon" href="images/atlas.png" sizes="48x48" type="image/png" />
    <link rel="icon" href="images/atlas.png" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="images/atlas.png" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id="head">
            <h1><a href="/top"><img src="images/atlas.png"></a></h1>
            <div class="nav-open">
                    <p>{{ Auth::user()->username }}さん<img src="images/icon1.png"></p>
                    <nav>
                      <a href="" class="menu-btn"></a>
                      <div class="accordion-menu"></div>
                        <div class="accordion-title js-accordion-title">
                    </div>
                    <div class="accordion-container"></div>
                    <!-- $user->usernameで名前カラムを渡す -->
                    <!-- アコーディオンメニュー -->
                    <div class="accordion-content"></div>
                        <ul>
                            <li class="accordion-list"><a href="/top">HOME</a></li>
                            <li class="accordion-list"><a href="/profile">プロフィール編集</a></li>
                            <li class="accordion-list"><a href="/logout">ログアウト</a></li>
                        </ul>
                    </nav>
                    @if(Auth::user()->images=="dawn.png")
                    <img src="/public/images/icon1.png" class="icon" width="" alt="">
                    @else
                    <img src=" {{ asset('storage/'.Auth::user()->images)}}" class="icon" width="70" height="70">
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
            <!-- モーダルの表示 -->
<div id="modal" class="js-modal">
    <div class="modal-container">
        <div class="modal-content">
            <!-- モーダルの中身 -->
            <textarea name="post" id="post" placeholder="follow-posts" maxlength="150"></textarea>
            <p>モーダルのコンテンツ</p>
            <button class="modalClose">閉じる</button>
        </div>
    </div>
</div>
            <footer>
            </footer>
                <!-- Javascript・jQueryのファイルリンク -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
            <!-- ↓この記述で繋げる -->
            <script src="{{ asset('js/script.js') }}"></script>
            <script src="/public/js/script.js"></script>
        </body>
        </html>
