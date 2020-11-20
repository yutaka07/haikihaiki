@extends('layouts.admin.app') @section('content')
<div class="container">
    <div>
        <h1 class="u-title__center">コンビニオーナー</h1>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">{{ __("Register") }}</div>

                <div class="c-card__body">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <div class="c-form__group ">
                            <div>
                                <label for="name">コンビニ名</label>
                                <input
                                    placeholder="コンビニ名"
                                    id="name"
                                    type="text"
                                    class="c-form__group--control @error('name') c-form__error--background @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autocomplete="name"
                                    autofocus
                                />

                                @error('name')
                                <span role="alert">
                                    <strong class="c-form__error--text">{{
                                        $message
                                    }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="c-form__group ">
                            <div class="col-md-3">
                                <label for="prefectures_id">都道府県</label>
                                <select
                                    class="c-form__group--control"
                                    id="prefectures_id"
                                    name="prefectures_id"
                                >
                                    @foreach ($prefectures as $prefecture)
                                    <option
                                        value="{{ $prefecture->id }}"
                                        >{{ $prefecture->name }}</option
                                    >
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="c-form__group ">
                            <div>
                                <label for="branch">支店名</label>
                                <input
                                    placeholder="支店名"
                                    id="branch"
                                    type="text"
                                    class="c-form__group--control @error('branch') c-form__error--background @enderror"
                                    name="branch"
                                    value="{{ old('branch') }}"
                                    required
                                    autocomplete="branch"
                                    autofocus
                                />

                                @error('branch')
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
                                <label for="address">住所</label>
                                <input
                                    placeholder="住所"
                                    id="address"
                                    type="text"
                                    class="c-form__group--control @error('address') c-form__error--background @enderror"
                                    name="address"
                                    value="{{ old('address') }}"
                                    required
                                    autocomplete="address"
                                    autofocus
                                />

                                @error('address')
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
                                <label for="email">メールアドレス</label>
                                <input
                                    placeholder="メールアドレス"
                                    id="email"
                                    type="email"
                                    class="c-form__group--control"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                />
                            </div>
                        </div>

                        <div class="c-form__group ">
                            <div>
                                <label for="password">パスワード</label>
                                <input
                                    placeholder="８文字以上の半角英数字"
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
                                <label for="password-confirm"
                                    >パスワード（確認）</label
                                >
                                <input
                                    placeholder="パスワード（確認）"
                                    id="password-confirm"
                                    type="password"
                                    class="c-form__group--control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
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
                            <button type="submit" class="c-btn__form">
                                {{ __("Register") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
