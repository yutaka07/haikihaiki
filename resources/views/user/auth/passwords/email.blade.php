@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">{{ __('Reset Password') }}</div>

                <div class="c-card__body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.password.email') }}">
                        @csrf

                        <div class="c-form__group row">
                      
                            <div class="col-md-6">
                                <input placeholder="メールアドレス" id="email" type="email" class="c-form__group--control @error('email') c-form__error--background @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span  role="alert">
                                        <strong class="c-form__error--text">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="c-btn__form">
                                    {{ __('Send Password Reset Link') }}
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
