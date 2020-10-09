@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="title__center">マイページ</h1>
        <div class="form">
            <div class="card">
                <div class="card-header">プロフィール編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf

                        <div class="form-group row">
                           
                            <div class="col-md-6">
                                <input placeholder="お名前" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          
                            <div class="col-md-6">
                                <input placeholder="メールアドレス" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            
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