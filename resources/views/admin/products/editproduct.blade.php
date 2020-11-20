@extends('layouts.admin.app') @section('content')
<div class="container">
    <div>
        <h1 class="u-title__center">コンビニオーナー</h1>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">編集</div>

                <div class="c-card__body">
                    <form
                        method="post"
                        action="{{ route('admin.products.update', $product->id) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <div class="c-form__group ">
                            <div>
                                <label for="name">商品名</label>
                                <input
                                    placeholder="商品名"
                                    id="name"
                                    type="text"
                                    class="c-form__group--control @error('name') c-form__error--background @enderror"
                                    name="name"
                                    value="{{ $product->name }}"
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
                            <div>
                                <label for="expiration_date">消費期限</label>
                                <input
                                    id="expiration_date"
                                    type="datetime-local"
                                    class="c-form__group--control @error('expiration_date') c-form__error--background @enderror"
                                    name="expiration_date"
                                    value="{{ $date }}"
                                    required
                                    autocomplete="expiration_date"
                                    autofocus
                                />

                                @error('expiration_date')
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
                                <label for="price">価格（円）</label>
                                <input
                                    placeholder="価格"
                                    id="price"
                                    type="number"
                                    pattern="\d*"
                                    class="c-form__group--control @error('price') c-form__error--background @enderror"
                                    name="price"
                                    value="{{ $product->price }}"
                                    required
                                    autocomplete="price"
                                    autofocus
                                />

                                @error('price')
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
                                <label for="comment">商品詳細</label>
                                <textarea
                                    cols="30"
                                    rows="10"
                                    id="comment"
                                    type="comment"
                                    class="c-form__group--textarea @error('comment') c-form__error--background @enderror"
                                    name="comment"
                                    value=""
                                    required
                                    autocomplete="comment"
                                    >{{$product->comment}}
                                </textarea>

                                @error('comment')
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
                                <label
                                    class="c-form__group--photofilelabel"
                                    for="photofile"
                                    >写真を変更</label
                                >
                                <input
                                    placeholder="ファイル"
                                    accept="image/*"
                                    id="photofile"
                                    type="file"
                                    class="c-form__group--control c-form__group--photofile @error('photofile') c-form__error--background @enderror"
                                    name="photofile"
                                    autocomplete="new-photofile"
                                />

                                @error('photofile')
                                <span role="alert">
                                    <strong class="c-form__error--text">{{
                                        $message
                                    }}</strong>
                                </span>
                                @enderror
                                <img
                                    class="c-form__group--img"
                                    id="preview"
                                    src="{{$product->photofile}}"
                                    alt=""
                                />
                            </div>
                        </div>

                        <div class="c-form__group  ">
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
