@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="u-title__center">マイページ</h1>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">プロフィール編集</div>

                <div class="c-card__body">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf

                        <div class="c-form__group row">
                           
                            <div class="col-md-6">
                                <input placeholder="お名前" id="name" type="text" class="c-form__group--control @error('name') c-form__error--background @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span  role="alert">
                                        <strong class="c-form__error--text">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group row">
                          
                            <div class="col-md-6">
                                <input placeholder="メールアドレス" id="email" type="email" class="c-form__group--control @error('email') c-form__error--background @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span  role="alert">
                                        <strong class="c-form__error--text">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group row mb-0">
                            
                                <button type="submit" class="c-btn__form">
                                    更新
                                </button>
                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection