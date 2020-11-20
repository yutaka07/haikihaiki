<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>
        <meta name="description" content="haikishareの商品一覧ページです。" />
        <meta name="keywords" content="コンビニ,お弁当,安い,廃棄" />

        <!-- Scripts -->
        <script src="{{ asset('/js/top.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
        />

        <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    </head>

    <body>
        <div id="app">
            <nav class="">
                <div class="l-header">
                    @unless (Auth::guard('user')->check())
                    <a class="p-top__title" href="{{ url('/') }}">
                        {{ config("app.name", "Laravel") }}
                    </a>
                    @else
                    <a class="p-top__title" href="{{ route('user.top') }}">
                        {{ config("app.name", "Laravel") }}
                    </a>
                    @endunless
                    <div class="c-menu">
                        <!-- Right Side Of Navbar -->

                        <input
                            id="nav-input"
                            type="checkbox"
                            class="c-menu__input c-menu__unshown"
                        />
                        <label
                            id="nav-open"
                            class="c-menu__open"
                            for="nav-input"
                            ><span class="c-menu__open--line"></span
                        ></label>
                        <label
                            class="c-menu__close c-menu__unshown"
                            id="nav-close"
                            for="nav-input"
                        ></label>

                        <div class="c-menu__content">
                            <ul class="c-menu__drawer">
                                <!-- Authentication Links -->
                                @unless (Auth::guard('user')->check())
                                <li class="c-menu__item">
                                    <a
                                        class="c-menu__link"
                                        href="{{ route('user.login') }}"
                                        >{{ __("Login") }}</a
                                    >
                                </li>
                                @if (Route::has('user.register'))
                                <li class="c-menu__item">
                                    <a
                                        class="c-menu__link"
                                        href="{{ route('user.register') }}"
                                        >{{ __("Register") }}</a
                                    >
                                </li>
                                @endif @else
                                <li class="c-menu__item ">
                                    <a class="p-top__title">
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li class="c-menu__item ">
                                    <a
                                        class="c-menu__link"
                                        href="{{ route('user.top') }}"
                                    >
                                        商品一覧
                                    </a>
                                </li>
                                <li class="c-menu__item ">
                                    <a
                                        class="c-menu__link"
                                        href="{{ route('user.home') }}"
                                    >
                                        マイページ
                                    </a>
                                </li>
                                <li class="c-menu__item ">
                                    <a
                                        class="c-menu__link"
                                        href="{{ route('user.edit') }}"
                                    >
                                        プロフィール編集
                                    </a>
                                </li>
                                <li class="c-menu__item">
                                    <a
                                        class="c-menu__link"
                                        href="{{ route('user.logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    >
                                        ログアウト
                                    </a>

                                    <form
                                        id="logout-form"
                                        action="{{ route('user.logout') }}"
                                        method="POST"
                                        style="display: none;"
                                    >
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
                    <router-view
                        :products="{{ $products }}"
                        :prefectures="{{ $prefectures }}"
                        :admins="{{ $admins }}"
                    ></router-view>
                </div>
            </main>
            <footer class="l-footer">©︎haikishare.inc</footer>
        </div>
    </body>
</html>
