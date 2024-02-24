<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="width=device-width,initial-scale=1" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/logout.css') }} ">
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
    <h1><img src="images/atlas.png"></h1>
    <p>Social Network Service</p>
  </header>
  <div id="container">
    @yield('content')
  </div>
  <script src="/public/js/app.js"></script>
  <script src="/resources/assets/js/app.js"></script>
</body>
</html>
