@extends('layouts.admin.app') @section('content')
<div class="container">
    <div>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">{{ __("Reset Password") }}</div>

                <div class="c-card__body">
                    <form
                        method="POST"
                        action="{{ route('admin.password.update') }}"
                    >
                        @csrf

                        <input
                            type="hidden"
                            name="token"
                            value="{{ $token }}"
                        />

                        <div class="c-form__group ">
                            <div>
                                <input
                                    placeholder="メールアドレス"
                                    id="email"
                                    type="email"
                                    class="c-form__group--control @error('email') c-form__error--background @enderror"
                                    name="email"
                                    value="{{ $email ?? old('email') }}"
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
                                    placeholder="パスワード"
                                    id="password"
                                    type="password"
                                    class="c-form__group--control @error('password') c-form__error--background @enderror"
                                    name="password"
                                    required
                                    autocomplete="new-password"
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
                                <input
                                    placeholder="パスワード（確認）"
                                    id="password-confirm"
                                    type="password"
                                    class="c-form__group--control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>
                        </div>

                        <div class="c-form__group ">
                            <div>
                                <button type="submit" class="c-btn__form">
                                    {{ __("Reset Password") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
