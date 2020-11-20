@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="u-title__center">マイページ</h1>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">プロフィール編集</div>

                <div class="c-card__body">
                    <form method="POST" action="{{ route('admin.update', $admin->id) }}">
                        @csrf

                        <div class="c-form__group row">

                            <div class="col-md-6">
                            <label for="name">コンビニ名</label>
                                <input placeholder="コンビニ名" id="name" type="text" class="c-form__group--control @error('name') c-form__error--background @enderror" name="name" value="{{ $admin->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span role="alert">
                                    <strong class="c-form__error--text" class="c-form__error--text">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group row">

                            <div class="col-md-3">
                            <label for="prefectures_id">都道府県</label>
                                <select class="c-form__group--control" id="prefectures_id" name="prefectures_id">
                                    @foreach ($prefectures as $prefecture)
                                    @if ($prefecture->id === $admin->prefectures_id)
                                    <option value="{{ $prefecture->id }}" selected>{{ $prefecture->name }}</option>
                                    @else
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="c-form__group row">


                            <div class="col-md-6">
                            <label for="branch">支店名</label>
                                <input placeholder="支店名" id="branch" type="text" class="c-form__group--control @error('branch') c-form__error--background @enderror" name="branch" value="{{ $admin->branch }}" required autocomplete="branch" autofocus>

                                @error('branch')
                                <span role="alert">
                                    <strong class="c-form__error--text">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="c-form__group row">


                            <div class="col-md-6">
                            <label for="address">住所</label>
                                <input placeholder="住所" id="address" type="text" class="c-form__group--control @error('address') c-form__error--background @enderror" name="address" value="{{ $admin->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span role="alert">
                                    <strong class="c-form__error--text">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group row">


                            <div class="col-md-6">
                            <label for="email">メールアドレス</label>
                                <input placeholder="メールアドレス" id="email" type="email" class="c-form__group--control" name="email" value="{{ $admin->email }}" required autocomplete="email">

                                @error('email')
                                <span role="alert">
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