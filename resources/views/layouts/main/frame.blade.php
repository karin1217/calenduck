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
        .blog-form {
            line-height: 1.2em;
            padding: 1em;
        }

        .blog-form h6 {
            width: 100px;
            margin: 0 auto;
            font-size: 1.5em;
            padding: 0 0 0.8em 0;
            text-shadow: #9F9F9F 1px 1px 3px;
        }

        .blog-form .submit {
            margin-top: 5px;
        }

        .blog-form form {
            width: 100%;
            margin: 0 auto;
        }

        .blog-form form textarea {
            width: 90%;
            margin: 0 auto;
        }

        .blogs li {
            list-style: none;
            border-bottom: 1px solid #F9F9F9;
            margin-bottom: 10px;
            min-height: 5em;
        }

        .blogs li a {
            text-decoration: none;
            color: #f95a32;
        }

        .blogs li > .gravatar {
            position: relative;
            width: 8%;
            float: left;
        }

        .blogs li > .gravatar > img {
            width: 100%;
            border-radius: 50%;
        }

        .blogs li > .name {
            font-weight: 700;
            font-size: 17px;
            color: #000;
            margin-left: 12%;
            line-height: 1.2;
        }

        .blogs li > .time {
            font-weight: 700;
            font-size: 14px;
            color: #BDBAB6;
            margin-left: 12%;
            line-height: 1.2;
        }

        .blogs li > .text {
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 1.3;
            margin-left: 12%;
        }

        .pagination {
            float: right;
        }

        ul.blogs {
            width: 80%;
            margin: 0 auto;
        }

        .wrapper.wrapper-full {
            padding: 2em 0;
        }






    </style>

    {{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}
</head>

<body>

    @include('layouts.main._header')

    @if(route_class() == 'root')
        @include('layouts.main._slider')
    @endif

    <div class="container {{ route_class() }}-page">
        @yield('content')
    </div>

    @include('layouts.main._footer')

<script src="{{ asset('js/main.js') }}"></script>

<script>
    $(document).ready(function(){
        $("#feed-items").flexisel({
            visibleItems: 2,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: false,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:768,
                    visibleItems: 1,
                    itemsToScroll: 1

                },
                landscape: {
                    changePoint:768,
                    visibleItems: 2,
                    itemsToScroll: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3,
                    itemsToScroll: 3
                }
            }
        });



        console.log($('.alert').length);
        if($('.alert').length > 0) {
            var type = 'info';
            var classString = $('.alert').attr('class').substring(12);

            switch ( classString ) {
                case 'danger':
                    type = 'error';
                    break;
                default:
                    type = classString;
                    break;

            }

            $("body").overhang({
                type : type,
                message: $('.alert').text(),
                duration: 3,
                overlay: true
            });
        }
    });

</script>

</body>
</html>