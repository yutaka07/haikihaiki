<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HAIKISHARE</title>
        <meta name="description" content="haikishareでコンビニの廃棄する予定のおにぎり、パン、お弁当、お菓子などたくさんの商品をお安く購入できます。">
        <meta name="keywords" content="コンビニ,お弁当,安い,廃棄">

       <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

         <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

        <style>
          
        </style>
        
    </head>
    <body>
      <header class="nav-container">
        
        <h1 class="p-top__title">HAIKISHARE</h1>
      </header>
     <section class="c-hero c-contapner__fluid js-float-menu-target">
        <h2 class="c-hero__title">地球のために捨ててしまう物を安く買おう</h2>
      </section>
      <div class="p-top__sentence">
        <h3 class="p-top__container__title">HAIKISHAREとは</h3>
        <p>廃棄する予定だったコンビニの商品を安く買うことができるサービスです！</p>
      </div>
    <div class="p-top__main">
    <div class="p-top__container p-top__container__right">
     <h3 class="p-top__container__title">コンビニオーナーの方</h3>
     <div>
       <p>新規登録　ログイン</p>
       @unless (Auth::guard('admin')->check())
       <a class="c-btn-flat-border" href="{{ route('admin.login') }}">こちら</a>
       @else
       <a class="c-btn-flat-border" href="{{ route('admin.home') }}">こちら</a>
       @endunless
    </div>
    </div>
    <div class="p-top__container">
    <h3 class="p-top__container__title">一般の方</h3>
    <div>
      <p>新規登録　ログイン</p>
      @unless (Auth::guard('user')->check())
      <a class="c-btn-flat-border" href="{{ route('user.login') }}">こちら</a>
      @else
      <a class="c-btn-flat-border" href="{{ route('user.top') }}">こちら</a>
      @endunless
    </div>
    </div>
    </div>
    <footer class="l-footer">©︎haikishare.inc</footer>
    </body>
</html>
