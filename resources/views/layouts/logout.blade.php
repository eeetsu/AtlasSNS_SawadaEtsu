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
  <!-- BootstrapのCSS読み込み -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- BootstrapのJS読み込み -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


  <div id="container">
    @yield('content')
  </div>
  <script src="/public/js/app.js"></script>
  <script src="/resources/assets/js/app.js"></script>
</body>
</html>
