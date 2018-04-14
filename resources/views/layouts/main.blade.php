<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        @if(env('APP_ENV')!='local')
            <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        @endif




        <title>@yield('title','') - Karin's Home Diary </title>

        {{-- 科大博客 Google Fonts 加速 --}}
        {{-- 1-ajax.googleapis.com => ajax.lug.ustc.edu.cn --}}
        {{-- 2-fonts.googleapis.com => fonts.lug.ustc.edu.cn --}}
        {{-- 3-themes.googleusercontent.com => google-themes.lug.ustc.edu.cn --}}
        {{--@if(App::getLocale() == 'en')--}}
        {{--<link href='http://fonts.lug.ustc.edu.cn/css?family=Salsa|Rancho|Jockey+One|Oswald|Yanone+Kaffeesatz' rel='stylesheet' type='text/css' />--}}
        <link href='https://fonts.lug.ustc.edu.cn/css?family=Salsa|Rancho|Jockey+One|Oswald|Yanone+Kaffeesatz' rel='stylesheet' type='text/css' />
        @if(App::getLocale() == 'ja' or App::getLocale() == 'en')
        <link href="https://fonts.lug.ustc.edu.cn/earlyaccess/nicomoji.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.lug.ustc.edu.cn/earlyaccess/sawarabigothic.css" rel="stylesheet" type="text/css" />
        @elseif(App::getLocale() == 'ko')
        <link href='https://fonts.lug.ustc.edu.cn/css?family=Salsa|Rancho|Jockey+One|Oswald|Yanone+Kaffeesatz|Jua' rel='stylesheet' type='text/css' />
        @elseif(App::getLocale() == 'zh-CN')
        <link href="https://fonts.googleapis.com/earlyaccess/notosanssc.css" rel="stylesheet" type="text/css" />
        @endif
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        <style type="text/css">
            .select2-container .select2-selection--single{
                height:40px;
                line-height: 40px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                top: 7px;
            }
        </style>

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

        <script src="{{ asset('js/app.js') }}"></script>

        @if(App::getLocale() == 'zh-CN')
        {{--<script type="text/javascript" src="https://cdn.webfont.youziku.com/wwwroot/js/wf/youziku.api.min.js"></script>--}}
        {{--<script type="text/javascript">--}}
            {{--$youziku.load("#kids_main_nav", "6a0b49f78cb24eb0a18a1b8a58d6a7f8", "JetLinkBoldDoubleRound");--}}
            {{--/*$youziku.load("#id1,.class1,h1", "6a0b49f78cb24eb0a18a1b8a58d6a7f8", "JetLinkBoldDoubleRound");*/--}}
            {{--/*．．．*/--}}
            {{--$youziku.draw();--}}
        {{--</script>--}}
            <script type="text/javascript">
                $('.t-menu-1 #kids_main_nav').css({'font-family':'Noto Sans SC','font-weight': 900});
            </script>
        @endif
        @if(App::getLocale() == 'ko')
            <script type="text/javascript">
                $('.t-menu-1 #kids_main_nav').css('font-family','Jua')
            </script>

        @endif
    </body>
</html>