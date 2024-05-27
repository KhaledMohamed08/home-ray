@extends('site.layouts.empty')
@section('body')
    @include('site.includes.header')
        {{ $slot }}
    @include('site.includes.footer')
@endsection