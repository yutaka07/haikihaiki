<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/top.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="">
            <div class="nav-container">
            @unless (Auth::guard('user')->check())
                <a class="p-top__title" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @else
                <a class="p-top__title" href="{{ route('user.top') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @endunless
                <div class="">

                    <!-- Right Side Of Navbar -->
                   
                        <input id="nav-input" type="checkbox" class="nav-unshown">
                        <label id="nav-open" for="nav-input"><span></span></label>
                        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
              
                    
                 <div id="nav-content">

                     
                     <ul id="nav-drawer">
                         <!-- Authentication Links -->
                         @unless (Auth::guard('user')->check())
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('user.login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('user.register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item ">
                                <a class="nav-link"  >
                                    {{ Auth::user()->name }} 
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('user.home') }}" >
                                    マイページ 
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('user.edit') }}" >
                                    プロフィール編集 
                                </a>
                            </li>
                                <li class="nav-item">
                                
                                    <a class="nav-link" href="{{ route('user.logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                              
                            </li>
                            
                            @endunless
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="main">
        <div id="app2">
          <router-view :products="{{ $products }}"
          :prefectures="{{ $prefectures }}" :admins="{{ $admins }}"></router-view>
        </div>
        </main>
        <footer class="l-footer">©︎haikishare.inc</footer>
    </div>
</body>
</html>
