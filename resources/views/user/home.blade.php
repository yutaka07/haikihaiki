@extends('layouts.user.app')

@section('content')
<div id="app1">
 <router-view :products="{{ $products }}" :admins="{{ $admins }}"></router-view>
</div>
@endsection
