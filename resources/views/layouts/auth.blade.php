<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title', 'Authentication System')</title>


    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/flaticons/flaticon.css') }}">
@yield('stylesheet')

</head>
<body id="body">


    <header>
        @yield('navbar')
    </header>
    <div class="main">
        <main id="app">
            @yield('main-app')
        </main>
        <footer>&copy; {{ date('Y') }} {{ config('app.name') }} All right reserved</footer>
    </div>


<!-- Script -->
<script src="{{mix('js/app.js')}}"></script>
<script src="{{ asset('vendor/fontawesome/js/all.js') }}"></script>
<script src="{{ asset('js/validate.js') }}"></script>
@yield('script')
</body>
</html>
