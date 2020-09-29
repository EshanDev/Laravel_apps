@extends('layouts.auth')
@section('stylesheet')
    <link rel="stylesheet" href="{{mix('css/auth.css')}}">
@endsection
@section('navbar')
    @include('.partials.auth_navbar')
@endsection

@section('main-app')

    @switch($reg)
        @case('default')
        @include('.partials.auth_content')
        @break

        @default
        @include('.partials.auth_content')
    @endswitch
    @endsection
