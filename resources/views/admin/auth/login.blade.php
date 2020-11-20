@extends('layouts.admin.app') @section('content')
<div class="container">
    <div>
        <h1 class="u-title__center">コンビニオーナー</h1>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">{{ __("Login") }}</div>

                <div class="c-card__body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="c-form__group ">
                            <div>
                                <input
                                    id="email"
                                    type="email"
                                    class=" c-form__group--control @error('email') c-form__error--background @enderror"
                                    placeholder="メールアドレス"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    autofocus
                                />

                                @error('email')
                                <span role="alert">
                                    <strong class="c-form__error--text">{{
                                        $message
                                    }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group ">
                            <div>
                                <input
                                    id="password"
                                    type="password"
                                    class=" c-form__group--control @error('password') c-form__error--background @enderror"
                                    placeholder="パスワード"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                />

                                @error('password')
                                <span role="alert">
                                    <strong class="c-form__error--text">{{
                                        $message
                                    }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group ">
                            <div>
                                <div>
                                    <input class="c-form__group--check"
                                    type="checkbox" name="remember"
                                    id="remember"
                                    {{ old("remember") ? "checked" : "" }}>

                                    <label for="remember">
                                        自動でログイン
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="c-form__group  ">
                            <div class="">
                                <button type="submit" class="c-btn__form">
                                    {{ __("Login") }}
                                </button>
                                <div class="c-btn__link">
                                    @if (Route::has('admin.password.request'))
                                    <a
                                        class="btn"
                                        href="{{
                                            route('admin.password.request')
                                        }}"
                                    >
                                        パスワードお忘れの方
                                    </a>
                                    @endif @if (Route::has('admin.register'))
                                    <a
                                        class="btn"
                                        href="{{ route('admin.register') }}"
                                        >{{ __("Register") }}</a
                                    >
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
