@extends('layouts.admin.app') 

@section('content')
<div id="app">
    <router-view :products="{{ $products }}"></router-view>
</div>
@endsection
