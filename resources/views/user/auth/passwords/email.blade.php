@extends('layouts.user.app') @section('content') @if (session('status'))
<div class="c-alert">
    <div class="c-alert__feedback c-alert__success" role="alert">
        {{ session("status") }}
    </div>
</div>
@endif
<div class="container">
    <div>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">{{ __("Reset Password") }}</div>

                <div class="c-card__body">
                    <form
                        method="POST"
                        action="{{ route('user.password.email') }}"
                    >
                        @csrf

                        <div class="c-form__group ">
                            <div>
                                <input
                                    placeholder="メールアドレス"
                                    id="email"
                                    type="email"
                                    class="c-form__group--control @error('email') c-form__error--background @enderror"
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

                        <div class="c-form__group  ">
                            <div>
                                <button type="submit" class="c-btn__form">
                                    {{ __("Send Password Reset Link") }}
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
