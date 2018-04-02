<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//zh-CN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="zh-CN">
<head>
    <title>Nivo Slider Demo</title>
    {{--<link rel="stylesheet" href="/themes/default/default.css" type="text/css" media="screen" />--}}
    {{--<link rel="stylesheet" href="/themes/light/light.css" type="text/css" media="screen" />--}}
    {{--<link rel="stylesheet" href="/themes/dark/dark.css" type="text/css" media="screen" />--}}
    {{--<link rel="stylesheet" href="/themes/bar/bar.css" type="text/css" media="screen" />--}}
    {{--<link rel="stylesheet" href="/demo/nivo-slider.css" type="text/css" media="screen" />--}}
    {{--<link rel="stylesheet" href="/demo/style.css" type="text/css" media="screen" />--}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
    <a href="http://dev7studios.com" id="dev7link" title="Go to dev7studios">dev7studios</a>

    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <img src="/demo/images/toystory.jpg" data-thumb="/demo/images/toystory.jpg" alt="" />
            <a href="http://dev7studios.com"><img src="/demo/images/up.jpg" data-thumb="/demo/images/up.jpg" alt="" title="This is an example of a caption" /></a>
            <img src="/demo/images/walle.jpg" data-thumb="/demo/images/walle.jpg" alt="" data-transition="slideInLeft" />
            <img src="/demo/images/nemo.jpg" data-thumb="/demo/images/nemo.jpg" alt="" title="#htmlcaption" />
        </div>
        <div id="htmlcaption" class="nivo-html-caption">
            <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
        </div>
    </div>

</div>
{{--<script type="text/javascript" src="/demo/scripts/jquery-1.9.0.min.js"></script>--}}
{{--<script type="text/javascript" src="/demo/jquery.nivo.slider.js"></script>--}}
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect:"sliceUpDownLeft",
            slices:15,
            boxCols:8,
            boxRows:4,
            animSpeed:500,
            pauseTime:5000,
            startSlide:0,
            directionNav:true,
            controlNav:true,
            controlNavThumbs:false,
            pauseOnHover:true,
            manualAdvance:false
        });
    });
</script>
</body>
</html>