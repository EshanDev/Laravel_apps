@extends('layouts.auth')
@section('stylesheet')
    <link rel="stylesheet" href="{{mix('css/auth.css')}}">
@endsection



@section('navbar')
    @include('.partials.auth_navbar')
@endsection
@section('main-app')
    @switch($route)
        @case('register')
        @include('.partials.verify_coded')
        @break

        @case('confirmed')
        @include('.partials.verify_check')
        @break

        @case('registration_code')
        @include('.partials.auth_registration_code')
        @break

        @case('putYourCode')
        @include('.partials.auth_put_registration_code')
        @break
        @default
        @include('.partials.auth_content')
    @endswitch
@endsection
