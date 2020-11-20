@extends('layouts.user.app')

@section('content')
<div class="container">
    <div>
        <h1 class="u-title__center">一般の方</h1>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">{{ __('Register') }}</div>

                <div class="c-card__body">
                    <form method="POST" action="{{ route('user.register') }}">
                        @csrf

                        <div class="c-form__group ">

                            <div >
                                <label for="name">お名前</label>
                                <input placeholder="お名前" id="name" type="text" class="c-form__group--control @error('name') c-form__error--background @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span  role="alert">
                                    <strong class="c-form__error--text">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group ">

                            <div >
                                <label for="email">メールアドレス</label>
                                <input placeholder="メールアドレス" id="email" type="email" class="c-form__group--control" name="email" value="{{ old('email') }}" required autocomplete="email">


                            </div>
                        </div>

                        <div class="c-form__group ">

                            <div >
                                <label for="password">パスワード</label>
                                <input placeholder="８文字以上の半角英数字
                                " id="password" type="password" class="c-form__group--control @error('password') c-form__error--background @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span  role="alert">
                                    <strong class="c-form__error--text">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group ">

                            <div >
                                <label for="password-confirm">パスワード（確認）</label>
                                <input placeholder="パスワード（確認）" id="password-confirm" type="password" class="c-form__group--control" name="password_confirmation" required autocomplete="new-password">
                                @error('email')
                                <span  role="alert">
                                    <strong class="c-form__error--text">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group ">

                            <button type="submit" class="c-btn__form">
                                {{ __('Register') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection