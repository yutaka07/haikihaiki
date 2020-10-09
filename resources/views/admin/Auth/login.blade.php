@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="title__center">コンビニオーナー</h1>
        <div class="form">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input  id="email" type="email" class=" form-control @error('email') is-invalid @enderror" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input  id="password" type="password" class=" form-control @error('password') is-invalid @enderror" placeholder="パスワード" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        自動でログイン
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="">
                                <button type="submit" class="c-btn__form">
                                    {{ __('Login') }}
                                </button>
                                <div class="c-btn__link">
                                @if (Route::has('admin.password.request'))
                                    <a class="btn" href="{{ route('admin.password.request') }}">
                                        パスワードお忘れの方
                                    </a>
                                @endif
                                @if (Route::has('admin.register'))
                                <a class="btn" href="{{ route('admin.register') }}">{{ __('Register') }}</a>
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