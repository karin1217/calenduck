<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title', 'Life Style') - CalenDuck</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- 科大博客 Google Fonts 加速 --}}
    {{-- 1-ajax.googleapis.com => ajax.lug.ustc.edu.cn --}}
    {{-- 2-fonts.googleapis.com => fonts.lug.ustc.edu.cn --}}
    {{-- 3-themes.googleusercontent.com => google-themes.lug.ustc.edu.cn --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link href="https://fonts.lug.ustc.edu.cn/earlyaccess/notosanssc.css" rel="stylesheet" type="text/css" />

    <style>




    </style>
</head>

<body>
    @include('layouts.main._header')

    {{--@include('layouts.main._slider')--}}

    @yield('content')

    @include('layouts.main._footer')

<script src="{{ asset('js/main.js') }}"></script>

<script>
    $(document).ready(function(){
        //$('.sub-nav').
    });

</script>

</body>
</html>