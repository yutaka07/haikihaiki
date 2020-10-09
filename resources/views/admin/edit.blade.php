@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="title__center">マイページ</h1>
        <div class="form">
            <div class="card">
                <div class="card-header">プロフィール編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update', $admin->id) }}">
                        @csrf

                        <div class="form-group row">
                           
                            <div class="col-md-6">
                                <input placeholder="コンビニ名" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $admin->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                <div class="form-group row">
            
                <div class="col-md-3">
                    <select class="form-control" id="prefectures_id" name="prefectures_id">
                    @foreach ($prefectures as $prefecture)
                    @if ($prefecture->id === $admin->prefectures_id)
                    <option value="{{ $prefecture->id }}" selected>{{ $prefecture->name }}</option>
                    @else
                    <option value="{{ $prefecture->id }}" >{{ $prefecture->name }}</option>
                    @endif
                    @endforeach
                </select>
              </div>
            </div>

                        <div class="form-group row">
                           

                            <div class="col-md-6">
                                <input placeholder="支店名" id="branch" type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ $admin->branch }}" required autocomplete="branch" autofocus>

                                @error('branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                           

                            <div class="col-md-6">
                                <input placeholder="住所" id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $admin->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           

                            <div class="col-md-6">
                                <input placeholder="メールアドレス" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email }}" required autocomplete="email">

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