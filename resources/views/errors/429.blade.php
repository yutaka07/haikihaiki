@extends('minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', "リクエストが多すぎます。")