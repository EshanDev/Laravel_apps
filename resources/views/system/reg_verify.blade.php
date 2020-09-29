@extends('layouts.auth')
@section('stylesheet')
    <link rel="stylesheet" href="{{mix('css/auth.css')}}">
@endsection



@section('navbar')
    @include('.partials.auth_navbar')
@endsection
@section('main-app')
    @switch($reg)
        @default
        @include('.partials.auth_put_registration_code')
    @endswitch
@endsection
