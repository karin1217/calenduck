<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
    <!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!-->	<html class="not-ie no-js" lang="en">  <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>@yield('title','') - Karin's Home Diary </title>

        {{-- 科大博客 Google Fonts 加速 --}}
        {{-- 1-ajax.googleapis.com => ajax.lug.ustc.edu.cn --}}
        {{-- 2-fonts.googleapis.com => fonts.lug.ustc.edu.cn --}}
        {{-- 3-themes.googleusercontent.com => google-themes.lug.ustc.edu.cn --}}
        <link href='http://fonts.lug.ustc.edu.cn/css?family=Salsa|Rancho|Jockey+One|Oswald|Yanone+Kaffeesatz|Nico+Moji' rel='stylesheet' type='text/css' />
        <link href="https://fonts.lug.ustc.edu.cn/earlyaccess/nicomoji.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    </head>

    <body class="t-blue t-pattern-1 secondary-page t-menu-1 t-header-1 t-text-1">

        <div class="top-panel">
            <div class="l-page-width">
                <div class="tweets"></div>
            </div>

        </div><!--/ .top-panel-->

        <div class="kids-bg-level-1">

            @include('layouts._header')


            <div class="inner_copyright"></div>
            {{--@yield('content')--}}

            @if(isset($isShowSlider))
                @include('layouts._slider')
            @endif


        </div><!-- .bg-level-1 -->

        @include('layouts._middle')


        @include('layouts._footer')

<div id="kids_theme_control_panel">
    <a href="#" id="kids_theme_control_label"></a>
</div><!-- #kids_theme_control_panel -->

{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>--}}
{{--<!--[if lt IE 9]>--}}
{{--<script src="js/selectivizr-and-extra-selectors.min.js"></script>--}}
{{--<![endif]-->--}}
{{--<script src="js/jquery-ui-1.8.16.custom.min.js"></script>--}}
{{--<script src="js/jquery.easing-1.3.min.js"></script>--}}
{{--<script src="js/jquery.nivo.slider.pack.js"></script>--}}
{{--<script src="js/jquery.jcarousel.min.js"></script>--}}
{{--<script src="js/video.js"></script>--}}
{{--<script src="js/jquery.prettyPhoto.js"></script>--}}
{{--<script src="js/scripts.js"></script>--}}
{{--<script src="themeChanger/js/colorpicker.js"></script>--}}
{{--<script src="themeChanger/js/themeChanger.js"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>