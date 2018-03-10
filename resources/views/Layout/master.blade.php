<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @stack('styles')

    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
</head>
<body>

@yield('content')
<script src="{{asset('js/app.js')}}"></script>

@stack('scripts')

</body>
</html>