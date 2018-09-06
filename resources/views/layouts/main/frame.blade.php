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
    {{--<link href="https://fonts.lug.ustc.edu.cn/earlyaccess/notosanssc.css" rel="stylesheet" type="text/css" />--}}



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




        a[id^="upload-preview"]>img {
            width: 50px;
        }


    </style>
    <style>
        /*
 * jQuery FlexSlider v2.4.0
 * http://www.woothemes.com/flexslider/
 *
 * Copyright 2012 WooThemes
 * Free to use under the GPLv2 and later license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Contributing author: Tyler Smith (@mbmufffin)
 *
 */
        /* ====================================================================================================================
         * FONT-FACE
         * ====================================================================================================================*/
        @font-face {
            font-family: 'flexslider-icon';
            src: url('../fonts/webfont/flexslider-icon.eot');
            src: url('../fonts/webfonts/flexslider-icon.eot?#iefix') format('embedded-opentype'), url('../fonts/webfonts/flexslider-icon.woff') format('woff'), url('../fonts/webfonts/flexslider-icon.ttf') format('truetype'), url('../fonts/webfonts/flexslider-icon.svg#flexslider-icon') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        /* ====================================================================================================================
         * RESETS
         * ====================================================================================================================*/
        .flex-container a:hover,
        .flex-slider a:hover,
        .flex-container a:focus,
        .flex-slider a:focus {
            outline: none;
        }
        .slides,
        .slides > li,
        .flex-control-nav,
        .flex-direction-nav {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .flex-pauseplay span {
            text-transform: capitalize;
        }
        /* ====================================================================================================================
         * BASE STYLES
         * ====================================================================================================================*/
        .flexslider {
            margin: 0;
            padding: 0;
        }
        .flexslider .slides > li {
            display: none;
            -webkit-backface-visibility: hidden;
        }
        .flexslider .slides img {
            width: 100%;
            display: block;
        }
        .flexslider .slides:after {
            content: "\0020";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: 0;
            height: 0;
        }
        html[xmlns] .flexslider .slides {
            display: block;
        }
        * html .flexslider .slides {
            height: 1%;
        }
        .no-js .flexslider .slides > li:first-child {
            display: block;
        }
        /* ====================================================================================================================
         * DEFAULT THEME
         * ====================================================================================================================*/
        .flexslider {
            margin: 0 0 10px;
            background: #ffffff;
            border: 4px solid #ffffff;
            position: relative;
            zoom: 1;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
            -o-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
            box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
        }
        .flexslider .slides {
            zoom: 1;
        }
        .flexslider .slides img {
            height: auto;
        }
        .flex-viewport {
            max-height: 1450px;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -ms-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
            border: 1px solid #D1CFCF;

        }

        .loading .flex-viewport {
            /*max-height: 300px;*/
            width: max-content;
        }
        .carousel li {
            margin-right: 5px;
        }
        .flex-direction-nav {
            *height: 0;
        }
        .flex-direction-nav a {
            text-decoration: none;
            display: block;
            width: 24px;
            height: 24px;
            margin: -20px 0 0;
            position: absolute;
            top: 41%;
            z-index: 10;
            overflow: hidden;
            opacity: 0;
            cursor: pointer;

            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            background: url(../images/left.png) 0px 0px ;
            text-indent: -9999px ;
        }

        .flex-direction-nav .flex-prev {
            left: -50px;
        }
        .flex-direction-nav .flex-next {
            right: -50px;

            background: url(../images/right.png) 0px 0px ;

        }
        .flexslider:hover .flex-direction-nav .flex-prev {
            opacity: 0.7;
            left: 10px;
        }
        .flexslider:hover .flex-direction-nav .flex-prev:hover {
            opacity: 1;
        }
        .flexslider:hover .flex-direction-nav .flex-next {
            opacity: 0.7;
            right: 10px;
        }
        .flexslider:hover .flex-direction-nav .flex-next:hover {
            opacity: 1;
        }
        .flex-direction-nav .flex-disabled {
            opacity: 0!important;
            filter: alpha(opacity=0);
            cursor: default;
        }
        .flex-pauseplay a {
            display: block;
            width: 20px;
            height: 20px;
            position: absolute;
            bottom: 5px;
            left: 10px;
            opacity: 0.8;
            z-index: 10;
            overflow: hidden;
            cursor: pointer;
            color: #000;
        }
        .flex-pauseplay a:before {
            font-family: "flexslider-icon";
            font-size: 20px;
            display: inline-block;
            content: '\f004';
        }
        .flex-pauseplay a:hover {
            opacity: 1;
        }
        .flex-pauseplay a .flex-play:before {
            content: '\f003';
        }
        .flex-control-nav {
            width: 100%;
            position: absolute;
            bottom: -40px;
            text-align: center;
        }
        .flex-control-nav li {
            margin: 0 6px;
            display: inline-block;
            zoom: 1;
            *display: inline;
        }
        .flex-control-paging li a {
            width: 11px;
            height: 11px;
            display: block;
            background: #666;
            background: rgba(0, 0, 0, 0.5);
            cursor: pointer;
            text-indent: -9999px;
            -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.3);
            -o-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.3);
            box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.3);
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
        }
        .flex-control-paging li a:hover {
            background: #333;
            background: rgba(0, 0, 0, 0.7);
        }
        .flex-control-paging li a.flex-active {
            background: #000;
            background: rgba(0, 0, 0, 0.9);
            cursor: default;
        }
        .flex-control-thumbs {
            margin: 5px 0 0;
            position: static;
            overflow: hidden;
        }
        .flex-control-thumbs li {
            width: 24.2%;
            float: left;
            margin: 0 1% 0 0;
        }
        .flex-control-thumbs li:nth-child(4){
            margin:0;
        }
        .flex-control-thumbs img {
            width: 100%;
            height: auto;
            display: block;
            opacity: .7;
            cursor: pointer;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -ms-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
            border: 1px solid #D1CFCF;
        }
        .flex-control-thumbs img:hover {
            opacity: 1;
        }
        .flex-control-thumbs .flex-active {
            opacity: 1;
            cursor: default;
        }
        /* ====================================================================================================================
         * RESPONSIVE
         * ====================================================================================================================*/
        @media screen and (max-width: 860px) {
            .flex-direction-nav .flex-prev {
                opacity: 1;
                left: 10px;
            }
            .flex-direction-nav .flex-next {
                opacity: 1;
                right: 10px;
            }
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
        'use strict';



        $('.add-to-backup').text($('.add-to').text());
        $('.stocks-backup').text($('.stocks>span').text());

        var fileMimeType = 'image/png';


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



        //console.log($('.alert').length);
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

        /**
         * 根据mimeType指定文件的扩展名
         */
        function getFileExtension(mimeType){
            switch (mimeType)
            {
                case 'image/png':
                    return 'png';
                case 'image/gif':
                    return 'gif';
                case 'image/jpg':
                case 'image/jpeg':
                default:
                    return 'jpg';
            }
        }

        function bindPlay(obj){
            obj.on('click','.bg_music',function(){

                //     var num = $('#bg_music_btn').attr('num');
                // if(num == "1")
                // {
                //     $('#bg_music_btn').attr('num','0');
                //mp3.pause();
                // }
                // if(num == "0")
                // {
                //     $('#bg_music_btn').attr('num','1');

                //}
            });
        }

        $('.play-sound').on('click',function(){
            var $this = $(this);
            var data = $this.data();
            var mp3=$('#'+data.word)[0];

            if( typeof mp3 !== 'undefined'){
                mp3.play();
                return false;
            }
            //console.log(data.word);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('kids.word.voice') }}",
                method: "POST",
                data: {'word':data.word},
                //processData: false,
                //contentType: false,
                dataType: 'text',
                success: function (response) {
                    if( ! response ) {
                        $("body").overhang({
                            type : 'error',
                            message: '获取语音时发生异常，刷新后重试',
                            duration: 3,
                            overlay: true
                        });
                        return false;
                    }
                    //console.log(response);

                    var $bgm = $('<div class="bg_music"></div>');
                    $bgm.append('<audio id="'+data.word+'"  preload="auto" autoplay="autoplay" src="'+response+'" />');
                    $this.append($bgm);
                },
                error: function () {
                    console.log('Upload error');
                }
            });
        });

        $('.compare-in').on('mouseover',function(){
            $('.compare').css(
                {
                    'width':$(this).width()-4,
                    'height':$(this).find('img').height()+1

                    // 'width':$(this).find('img').css('width'),
                    //

                }
            );
        });


        /**----------------------------------
         *
         *       商品属性管理
         *
         *-----------------------------------*/

            //  添加二级分类


        var elRow = $('#tmp-row').clone();
        var inputTop = elRow.find('.attr-name>form>div>.input-group>input');

        $('.names').on('click','.add-attr-value',function () {
            var addFlag = true;
            //console.log($(this).data().pid);
            var pId = $(this).data().pid;
            var formId = '#attr-value-'+pId; //$(this).data().pid;
            var elForm = $(formId);
            var elDiv = elForm.find('div[class="form-group"]');

            //console.log(elDiv);
            elDiv.each(function () {
                if ($.trim($(this).find('input').val()) === '') {
                    addFlag = false;
                    return false;
                }
            });
            if( ! addFlag ) return false;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/products/attributes/create",
                method: "POST",
                data: {'name_id':pId, 'type':'value'},
                dataType: 'json',
                success: function (response) {
                    //console.log(response);
                    if(response.status === 'success') {
                        var el = $('#tmp-attr-value').clone();
                        el.show();
                        el.find('input').val('').attr({'data-id':response.id,'data-pid':pId, 'id':'input-attr-'+response.id, 'class':'form-control input-attr'});
                        el.appendTo(elForm);
                        el.find('input').focus();

                        $(window).bind('beforeunload', function () {
                            return false;
                        });
                    }

                },
                error: function () {
                    console.log('Add attribute error');
                }
            });

            //console.log(elDiv[0]);

        }).on('click','.add-attr-name',function () {     // 添加一级分类

            //console.log(elRow.find('.sub-category>form:first'));

            elRow.find('.attr-value>form').empty();//.prepend(elTmpSub);

            inputTop.val('').attr('data-id','');

            console.log(elRow);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/products/attributes/create",
                method: "POST",
                data: {'name':inputTop.val(),'category_id':$('#category').val(),'parent_id':0, 'type':'name'},
                //processData: false,
                //contentType: false,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if(response.status === 'success') {
                        inputTop.attr({'data-id':response.id,'id':'input-attr-'+response.id});
                        elRow.attr('class', 'row row-' + response.id);
                        elRow.find('div.attr-value>form').attr('id','attr-value-'+response.id);
                        elRow.find('div.attr-value>button.add-attr-value').attr('data-pid',response.id);
                        elRow.show();
                        $('#op-row').before(elRow);
                        $(window).bind('beforeunload', function () {
                            return false;
                        });
                    }

                },
                error: function () {
                    console.log('Upload error');
                }
            });
        }).on('blur','.input-attr',function () { //更新一级分类

            if($(this).data().type === 'name') {
                var data = {'name':$(this).val(), 'id': $(this).data().id};
            } else {
                var data = {'value':$(this).val(), 'id': $(this).data().id};
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/products/attributes/update",
                method: "POST",
                data: data,//{'name':$(this).val(), 'id': $(this).data().id, 'type':$(this).data().type},
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    $(window).unbind('beforeunload');

                },
                error: function () {
                    console.log('Update error');
                }
            });
        }).on('click','.del-category',function () { //删除分类
            var type = $(this).data().type;

            var id = $(this).prev().data().id;
            var $obj = $(this);

            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/product/categories/delete",
                method: "POST",
                data: {'id': id, 'type':type},
                dataType: 'json',
                beforeSend: function () {
                    $obj.empty().append($('<img src="/images/loading.gif" />'));
                },
                success: function (response) {
                    console.log(response);
                    $obj.empty().append($('<i class="fas fa-minus"></i>'));
                    if( response.status === 'success') {
                        if(type === 'top') {
                            $('.row-' + id).remove();
                        } else {
                            $obj.parent().parent().remove();
                        }
                    }
                    //$(window).unbind('beforeunload');

                },
                error: function () {
                    console.log('Update error');
                }
            })
        });


        /**----------------------------------
         *
         *       商品属性管理
         *
         *-----------------------------------*/


        $('#category')
            .select2()
            .on('change',function () {
                if($(this).data().type === 'products') {
                    var url = '/admin/products/' + $(this).val();
                } else if($(this).data().type === 'attributes'){
                    var url = '/admin/products/attributes/' + $(this).val();
                } else if($(this).data().type === 'sku') {
                    var url = '/admin/products/'+ $('#product-id').val() +'/edit/' + $(this).val();
                }

                window.location.href=url;
            });



    }); // end document ready


    /**
     * Created by Administrator on 14-12-01.
     * 模拟淘宝SKU添加组合
     * 页面注意事项：
     *      1、 .div_contentlist   这个类变化这里的js单击事件类名也要改
     *      2、 .Father_Title      这个类作用是取到所有标题的值，赋给表格，如有改变JS也应相应改动
     *      3、 .Father_Item       这个类作用是取类型组数，有多少类型就添加相应的类名：如: Father_Item1、Father_Item2、Father_Item3 ...
     */
    $(document).ready(function(){


        var productId = $('#product-id').val();

        if(typeof productId !== 'undefined') {
            var ue = UE.getEditor('container',{
                //工具栏上的所有的功能按钮和下拉框，可以在new编辑器的实例时选择自己需要的重新定义
                toolbars: [
                    [
                        'source', '|', 'undo', 'redo', '|',
                        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                        'directionalityltr', 'directionalityrtl', 'indent', '|',
                        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                        'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                        'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                        'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                        'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                        'print', 'preview', 'searchreplace', 'drafts', 'help'
                    ]
                ]
            });
        }



        // SKU动态生成时，需要暂存的数据
        var tempSkuData = [];
        var skuId;

        var classSKU = {
            getTempData: function() {
                return tempSkuData;
            },
            getAllSku: function (){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/admin/products/sku/" + productId,
                    method: "GET",
                    data: {},
                    dataType: 'json',
                    beforeSend: function () {
                        //$obj.empty().append($('<img src="/images/loading.gif" />'));
                    },
                    success: function (response) {
                        //console.log(response);
                        // //$obj.empty().append($('<i class="fas fa-minus"></i>'));
                        if( response.code === 0) {
                            return false;
                        } else {
                            if( response.code === 102) {
                                return false;
                            } else {
                                //console.log(response.data);
                                //SKU信息
                                $(".div_contentlist label").bind("change", function () {
                                    //console.log($(this).find('input').is(':checked'));
                                    // 单选框变化后生成的SKU表单
                                    classSKU.createTable(response.data);
                                    // $('[data-toggle="tooltip"]').tooltip();
                                });
                                // 初始SKU表单
                                classSKU.createTable(response.data);
                                $('[data-toggle="tooltip"]').tooltip();
                                $('.editForm').on('click','.upload-link',function(e){
                                    //$('#uploadDialog').modal('show').attr({'data-type':'sku-image','data-id':$(this).data('role')});
                                    e.preventDefault();
                                    $('#uploadDialog').attr({'data-type':$(this).attr('data-type'),'data-id':$(this).data('role')}).modal('show');
                                    console.log('change-avatar is clicked',$(this).attr('data-type'));
                                });
                            }
                        }
                        //console.log(result);
                    },
                    error: function () {
                        console.log('Update error');
                    }
                });
            },

            //SKU信息组合
            createTable: function (skuList) {
                classSKU.doCombination();
                //step.options.skuList = getAllSku();
                // console.log(skuList);
                var SKUObj = $(".attr-type");
                //var skuCount = SKUObj.length;//
                var arrayTile = [];//标题组数
                var arrayInfo = [];//盛放每组选中的CheckBox值的对象
                var arrayColumn = [];//指定列，用来合并哪些列
                var bCheck = true;//是否全选
                var columnIndex = 0;


                $.each(SKUObj, function (i, item){
                    //console.log(item);
                    arrayColumn.push(columnIndex);
                    //console.log(arrayColumn);
                    columnIndex++;
                    arrayTile.push(SKUObj.find("li").eq(i).html().replace("：", ""));
                    //console.log(arrayTile);
                    var itemName = "Father_Item" + i;
                    //选中的CHeckBox取值
                    var order = [];
                    //var subOrder = [];
                    $("." + itemName + " input[type=checkbox]:checked").each(function (){
                        // Older
                        //order.push($(this).val());
                        order.push($(this).next().find('label').html()+'-|-'+$(this).val());
                    });

                    arrayInfo.push(order);
                    //console.log(arrayInfo);

                    if (order.join() === ""){
                        bCheck = false;
                    }
                    //var skuValue = SKUObj.find("li").eq(index).html();
                });
                //开始创建Table表
                if (bCheck === true) {
                    var RowsCount = 0;
                    $("#sku-table").html("");
                    var table = $("<table id=\"process\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" style=\"width:100%;padding:5px;\"></table>");
                    table.appendTo($("#sku-table"));
                    var table_head = $("<thead></thead>");
                    table_head.appendTo(table);
                    var trHead = $("<tr></tr>");
                    trHead.appendTo(table_head);
                    //创建表头
                    $.each(arrayTile, function (index, item) {
                        var td = $("<th>" + item + "</th>");
                        td.appendTo(trHead);
                    });
                    var itemColumHead = $("<th  style=\"width:70px;\">价格</th><th style=\"width:70px;\">库存</th> ");
                    itemColumHead.appendTo(trHead);
                    //var itemColumHead2 = $("<td >商家编码</td><td >商品条形码</td>");
                    //itemColumHead2.appendTo(trHead);
                    var itemColumHead2 = $("<th>商品图片</th>");
                    itemColumHead2.appendTo(trHead);
                    var tbody = $("<tbody></tbody>");
                    tbody.appendTo(table);
                    ////生成组合
                    var combData = classSKU.doExchange(arrayInfo);
                    if (combData.length > 0) {
                        //创建行
                        $.each(combData, function (index, item) {
                            var td_array = item.split(",");
                            var tr = $("<tr></tr>");
                            var td_sku = [];
                            tr.appendTo(tbody);
                            $.each(td_array, function (i, values) {
                                var class_data = values.split('-|-');
                                var td_value = class_data[0];
                                var td_data = class_data[1];
                                td_sku.push(td_data);
                                var td = $("<td data-id='"+td_data+"'>" + td_value + "</td>");
                                td.appendTo(tr);
                            });
                            var str_sku = td_sku.join('|');
                            var re = new RegExp('\\|','g');
                            var key = str_sku.replace(re,'-');
                            var td1 = $("<td><input name='price' data-id='"+key+"' class='sku-data' type='text' value='0.00'></td>");
                            td1.appendTo(tr);
                            var td2 = $("<td><input name='stocks' data-id='"+key+"' class='sku-data' type='text' value='0'></td>");
                            td2.appendTo(tr);
                            var td3 = $("<td data-sku=" + str_sku + "> <a class='upload-link' href='javascript:;' data-role='" + key + "' data-type='sku-image'>上传图片</a></td>");
                            var previewLink = '';
                            for(idx=0;idx<skuList.length;idx++){
                                if(skuList[idx]['sku'] === str_sku) {
                                    tempSkuData[key] = {'price': skuList[idx]['price'],'stocks': skuList[idx]['stocks']};
                                    // console.log('SKUIMAGE:',skuList[idx]['image']);
                                    if (skuList[idx]['image'] != null) {
                                        previewLink = "<a id='upload-preview" + key + "' href='javascript:;' data-toggle='tooltip' data-placement='top' data-html='true' title=\"<img src='" + skuList[idx]['image'] + "' >\"><img src='" + skuList[idx]['image'] + "' ></a> ";
                                        tempSkuData[key].img = skuList[idx]['image'];

                                    } else {
                                        if (typeof tempSkuData[key] !== 'undefined') {
                                            if(typeof tempSkuData[key].img !== 'undefined') {
                                                previewLink = "<a id='upload-preview" + key + "' href='javascript:;' data-toggle='tooltip' data-placement='top' data-html='true' title=\"<img src='" + tempSkuData[key].img + "' >\"><img src='" + tempSkuData[key].img + "' ></a> ";
                                            }
                                        }
                                    }
                                }
                            }

                            for(ix in tempSkuData) {
                                if(key === ix) {
                                    // console.log("Stocks", $(td2.find('input[name="stocks"]')[0]).val());
                                    // console.log("TEMP STOCKS", tempSkuData[key].stocks);
                                    $(td1.find('input[name="price"]')[0]).val(tempSkuData[key].price);
                                    $(td2.find('input[name="stocks"]')[0]).val(tempSkuData[key].stocks);
                                    //td3 = $("<td data-sku=" + str_sku + "><a id='upload-preview" + key + "' href='javascripr:;' data-toggle='tooltip' data-placement='top' data-html='true' title=\"<img src='" + tempSkuData[key].img + "' >\">图片预览</a> <a class='upload-link' href='javascripr:;' data-role='" + key + "' data-type='sku-image'>上传图片</a></td>");
                                    if(typeof tempSkuData[key].img !== 'undefined') {
                                        previewLink = "<a id='upload-preview" + key + "' href='javascript:;' data-toggle='tooltip' data-placement='top' data-html='true' title=\"<img src='" + tempSkuData[key].img + "' >\"><img src='" + tempSkuData[key].img + "' ></a> ";
                                    }
                                }
                            }
                            td3.prepend($(previewLink));

                            //else
                            //var td3 = $("<td data-sku="+str_sku+"><img src='"+image+"' /></td>");
                            td3.appendTo(tr);
                            //var td4 = $("<td ><input name=\"Txt_SnSon\" class=\"l-text\" type=\"text\" value=\"\"></td>");
                            //td4.appendTo(tr);
                        });
                    }
                    //结束创建Table表
                    arrayColumn.pop();//删除数组中最后一项
                    //合并单元格
                    $(table).mergeCell({
                        // 目前只有cols这么一个配置项, 用数组表示列的索引,从0开始
                        cols: arrayColumn
                    });



                    $('[data-toggle="tooltip"]').tooltip();
                } else{
                    //未全选中,清除表格
                    document.getElementById('sku-table').innerHTML="";
                }
            },
            //合并行与列
            doCombination: function () {
                $.fn.mergeCell = function (options) {
                    return this.each(function () {
                        var cols = options.cols;
                        for (var i = cols.length - 1; cols[i] != undefined; i--) {
                            // fixbug console调试
                            // console.debug(cols[i]);
                            mergeCell($(this), cols[i]);
                        }
                        dispose($(this));
                    });
                };
                function mergeCell($table, colIndex) {
                    $table.data('col-content', ''); // 存放单元格内容
                    $table.data('col-rowspan', 1); // 存放计算的rowspan值 默认为1
                    $table.data('col-td', $()); // 存放发现的第一个与前一行比较结果不同td(jQuery封装过的), 默认一个"空"的jquery对象
                    $table.data('trNum', $('tbody tr', $table).length); // 要处理表格的总行数, 用于最后一行做特殊处理时进行判断之用
                    // 进行"扫面"处理 关键是定位col-td, 和其对应的rowspan
                    $('tbody tr', $table).each(function (index) {
                        // td:eq中的colIndex即列索引
                        var $td = $('td:eq(' + colIndex + ')', this);
                        // 取出单元格的当前内容
                        var currentContent = $td.html();
                        // 第一次时走此分支
                        if ($table.data('col-content') == '') {
                            $table.data('col-content', currentContent);
                            $table.data('col-td', $td);
                        } else {
                            // 上一行与当前行内容相同
                            if ($table.data('col-content') == currentContent) {
                                // 上一行与当前行内容相同则col-rowspan累加, 保存新值
                                var rowspan = $table.data('col-rowspan') + 1;
                                $table.data('col-rowspan', rowspan);
                                // 值得注意的是 如果用了$td.remove()就会对其他列的处理造成影响
                                $td.hide();
                                // 最后一行的情况比较特殊一点
                                // 比如最后2行 td中的内容是一样的, 那么到最后一行就应该把此时的col-td里保存的td设置rowspan
                                if (++index == $table.data('trNum'))
                                    $table.data('col-td').attr('rowspan', $table.data('col-rowspan'));
                            } else { // 上一行与当前行内容不同
                                // col-rowspan默认为1, 如果统计出的col-rowspan没有变化, 不处理
                                if ($table.data('col-rowspan') != 1) {
                                    $table.data('col-td').attr('rowspan', $table.data('col-rowspan'));
                                }
                                // 保存第一次出现不同内容的td, 和其内容, 重置col-rowspan
                                $table.data('col-td', $td);
                                $table.data('col-content', $td.html());
                                $table.data('col-rowspan', 1);
                            }
                        }
                    });
                }
                // 同样是个private函数 清理内存之用
                function dispose($table) {
                    $table.removeData();
                }
            },
            //组合数组
            doExchange: function (doubleArrays) {
                //console.log(doubleArrays);
                var len = doubleArrays.length;
                if (len >= 2) {
                    var arr1 = doubleArrays[0];
                    // console.log(arr1);
                    var arr2 = doubleArrays[1];
                    var len1 = doubleArrays[0].length;
                    var len2 = doubleArrays[1].length;
                    var newLen = len1 * len2;
                    var temp = new Array(newLen);
                    var index = 0;
                    for (var i = 0; i < len1; i++) {
                        for (var j = 0; j < len2; j++) {
                            temp[index] = arr1[i] + "," + arr2[j];
                            index++;
                        }
                    }
                    var newArray = new Array(len - 1);
                    newArray[0] = temp;
                    if (len > 2) {
                        var _count = 1;
                        for (var i = 2; i < len; i++) {
                            newArray[_count] = doubleArrays[i];
                            _count++;
                        }
                    }
                    return classSKU.doExchange(newArray);
                }
                else {
                    return doubleArrays[0];
                }
            }
        };

        // 商品所有SKU一次性加载，作对比时待用
        // console.log("PRODUCT ID:",productId);
        if(typeof productId !== 'undefined') {
            classSKU.getAllSku();
        }

        // 保存按钮提交表单信息
        $('#save-edit').on('click',function(e){


            var formData = [];
            e.preventDefault();

            //console.log(ue.getContent());return;
            //console.log('SUBMIT IS CLICKED', classSKU.getTempData());
            var name = $('#name').val();
            var category = $('#category').val();
            // formData['name'] = name;
            // formData['category'] = category;


            $('.sku-data').each(function(){
                var key = $(this).data('id');
                //console.log($(this).attr('name'));

                if(typeof formData[key] === 'undefined') {
                    formData[key] = {};
                }
                if($(this).attr('name') === 'price') {
                    formData[key]['price'] = $(this).val();
                } else if($(this).attr('name') === 'stocks') {
                    formData[key]['stocks'] = $(this).val();
                }

                var previewTitle = $('#upload-preview'+key).attr('data-original-title');
                //console.log('UPLOAD PREVIEW',$('#upload-preview'+key));
                // 正则匹配图片地址
                //var preg = new RegExp('src=\'(.[^\>]+)?\'');
                var preg = new RegExp("src='(.[^\\>]{1,}){0,1}'", "g");
                var pregArr = preg.exec(previewTitle);
                if(pregArr) {
                    formData[key]['image'] = pregArr[1];
                } else {
                    formData[key]['image'] = ''
                }
            });

            // formData['name'] = name;
            // formData['category'] = category;

            //submitSku = eval(formData);

            //console.log();return false;
            //submitSku.append('skuList',formData.toString());
            Array.prototype.serializeObject = function (lName) {
                var o = {};
                $t = this;

                for (var pi in $t) {
                    for (var item in $t[pi]) {
                        o[lName+'[' + pi + '][' + item.toString() + ']'] = $t[pi][item].toString();
                    }
                }
                return o;
            };
            //console.log($.param(formData.serializeObject('skuList'))); return false;

            var postData = formData.serializeObject("skuList");
            postData['name'] = name;
            postData['category'] = category;
            postData['introduction'] = ue.getContent();
            console.log('POST DATA:',postData);
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/products/sku/update/"+productId,
                method: "POST",
                data: postData,//{formData.serializeObject("skuList"), 'name':name},
                traditional: true,
                dataType: 'json',
                beforeSend: function () {
                    //$obj.empty().append($('<img src="/images/loading.gif" />'));
                },
                success: function (response) {
                    console.log(response);return false;
                    // //$obj.empty().append($('<i class="fas fa-minus"></i>'));
                    if( response.code === 0) {
                        return false;
                    } else {
                        if( response.code === 102) {
                            return false;
                        } else {
                            //console.log(response.data);

                        }
                    }
                    //console.log(result);
                },
                error: function () {
                    console.log('Update error');
                }
            });
            //console.log(formData);
        }); //Click Save button




        /**
         * -------------------------------------------------------------
         * 图像裁切
         * -------------------------------------------------------------
         */

        var cropper={};
        var $image = $('#image-x');
        // 裁切时的源图片
        var sourceImg;
        var skuPreviewImg;

        var url = '';
        var formData = new FormData();

        //var console = window.console || { log: function () {} };
        var URL = window.URL || window.webkitURL;

        var $download = $('#download');
        var $dataX = $('#dataX');
        var $dataY = $('#dataY');
        var $dataHeight = $('#dataHeight');
        var $dataWidth = $('#dataWidth');
        var $dataRotate = $('#dataRotate');
        var $dataScaleX = $('#dataScaleX');
        var $dataScaleY = $('#dataScaleY');
        var options = {
            aspectRatio: 1,
            preview: '.img-preview',
            //viewMode: 1,
            //movable: false,
            dragMode:"move",
            zoomOnWheel: true,//false,
            //zoomOnTouch: false,
            wheelZoomRatio:0.01,
            modal:false,
            autoCropArea:1,
            cropBoxMovable:true,
            cropBoxResizable:true,
            dragCrop:false,
            toggleDragModeOnDblclick:true,
            //setSelect:   [10, 0, 256,256],
            // zoomable: false,
            crop: function (e) {
                $dataX.val(Math.round(e.detail.x));
                $dataY.val(Math.round(e.detail.y));
                $dataHeight.val(Math.round(e.detail.height));
                $dataWidth.val(Math.round(e.detail.width));
                $dataRotate.val(e.detail.rotate);
                $dataScaleX.val(e.detail.scaleX);
                $dataScaleY.val(e.detail.scaleY);
            },
            ready: function() {
                $image.cropper("zoomTo",1);
                $image.cropper(
                    "setCropBoxData", {'left': 106, 'top': 110, 'width': 800, 'height': 800}
                );
            }
        }

        // var fileExt;
        var uploadedImageName;
        var uploadedImageType;
        var uploadedImageURL;

        //console.log()

        $('#uploadDialog').on('shown.bs.modal', function() {

            console.log('Dialog Type', $(this).attr('data-type'));


            skuId = $(this).attr('data-id');
            var imgType = $(this).attr('data-type');
            switch (imgType) {
                case 'avatar-image':
                case 'product-image':
                    sourceImg = $('#product-image').attr('src');
                    url = '/admin/products/uploads/'+productId;
                    break;
                case 'sku-image':
                default:
                    skuPreviewImg = $('#upload-preview' + skuId);
                    console.log('SKU ID',skuId);
                    console.log('SKU PREVIEW IMAGE:',skuPreviewImg);
                    // 搜索图片预览链接中的图片标签
                    var tooltipImg = (typeof tempSkuData[skuId] === 'undefined') ? '' : tempSkuData[skuId].img; //skuPreviewImg.data('original-title');

                    var re = new RegExp('\\-','g');
                    var sku = skuId.replace(re,'|');
                    url = '/admin/products/sku/upload/image/'+productId;

                    formData.append('sku', sku);

                    console.log('TOOLTIP IMAGE:',tooltipImg);
                    // 正则匹配图片地址
                    // //var preg = new RegExp('src=\'(.[^\>]+)?\'');
                    // var preg = new RegExp("src='(.[^\\>]{1,}){0,1}'", "g");
                    // var temp = preg.exec(tooltipImg);
                    //console.log('XYYY',temp[1]);
                    // if (temp)
                    //     var tooltipImgSrc = temp[1];
                    // else
                    //     var tooltipImgSrc = '';
                    // console.log(tooltipImgSrc);

                    sourceImg = tooltipImg;
                    break;

            }

            // Import image
            var $inputImage = $('#inputImage');

            if (URL) {
                $inputImage.change(function () {
                    var files = this.files;
                    var file;

                    if (!$image.data('cropper')) {
                        return;
                    }

                    if (files && files.length) {
                        file = files[0];

                        if (/^image\/\w+$/.test(file.type)) {
                            uploadedImageName = file.name;
                            uploadedImageType = file.type;

                            if (uploadedImageURL) {
                                URL.revokeObjectURL(uploadedImageURL);
                            }

                            uploadedImageURL = URL.createObjectURL(file);
                            console.log(uploadedImageURL);
                            $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                            $inputImage.val('');
                        } else {
                            window.alert('Please choose an image file.');
                        }
                    }
                });
            } else {
                $inputImage.prop('disabled', true).parent().addClass('disabled');
            }

            console.log('OPTIONS:',options);
            $image.attr('src', sourceImg).cropper('destroy').cropper(options);

            console.log(cropper);

        }).on('hidden.bs.modal',function(){
            $image.cropper('destroy');


            $('[data-toggle="tooltip"]').tooltip();
        });


        // Methods
        //$('.docs-controls').on('click', '[data-method]', function () {
        $('#upload-button').on('click',function(){
                    {{--uploadedImageType = fileMimeType;--}}
            var $this = $(this);
            var data = $this.data();
            var cropper = $image.data('cropper');
            var cropped;
            var $target;
            var result;

            if ($this.prop('disabled') || $this.hasClass('disabled')) {
                return;
            }
            //
            if (cropper && data.method) {
                data = $.extend({}, data); // Clone a new one
                //
                if (typeof data.target !== 'undefined') {
                    $target = $(data.target);
                    //
                    if (typeof data.option === 'undefined') {
                        try {
                            data.option = JSON.parse($target.val());
                        } catch (e) {
                            console.log(e.message);
                        }
                    }
                }

                cropped = cropper.cropped;
                console.log(cropped);

                result = $image.cropper(data.method, data.option, data.secondOption);

                console.log("COUNTTTTTTT________________");
                switch (data.method) {
                    case 'getCroppedCanvas':
                        //console.log(this);return false;
                        if (result) {
                            // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
                            //cropper.getCroppedCanvas().toBlob(function (blob) {

                            formData.append('image', result.toDataURL(uploadedImageType));
                            //
                            // Use `jQuery.ajax` method
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: url,
                                method: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                dataType: 'json',
                                success: function (response) {
                                    if( response.code !== 1) {
                                        console.log(response);
                                        $('body').overhang({
                                            type : 'error',
                                            message: response.status,
                                            duration: 5,
                                            overlay: true
                                        })
                                        return false;
                                    } else {
                                        // console.log(response);

                                        $image.cropper('destroy');
                                        $image.attr('src','');
                                        // $image.cropper('destroy');
                                        $('#uploadDialog').modal('hide');
                                        var previewLink;
                                        previewLink = "<a id='upload-preview" + skuId + "' href='javascript:;' data-toggle='tooltip' data-placement='top' data-html='true' title=\"<img src='" + response.data.path + "' >\"><img src='" + response.data.path + "' ></a> ";
                                        //$('.upload-link[data-role="'+skuId+'"]')[0].before($(previewLink));
                                        //console.log($('.upload-link[data-role="'+skuId+'"]').parent());
                                        $('.upload-link[data-role="'+skuId+'"]').parent().prepend(previewLink);
                                        // console.log("THIS:",$previewLink);
                                        //previewLink = '';
                                        tempSkuData[skuId]= {'img': response.data.path};

                                        // console.log('tempSkuData',tempSkuData);
                                        // console.log('skuId',skuId);

                                        //$('[data-toggle="tooltip"]').tooltip();
                                        console.log('Upload success');

                                        //classSKU.getAllSku();
                                        return true;
                                    }
                                },
                                error: function () {
                                    console.log('Upload error');
                                }
                            });
                            //});
                        }

                        break;

                    case 'destroy':
                        if (uploadedImageURL) {
                            URL.revokeObjectURL(uploadedImageURL);
                            uploadedImageURL = '';
                            $image.attr('src', originalImageURL);
                        }
                        //
                        break;
                }

                if ($.isPlainObject(result) && $target) {
                    try {
                        $target.val(JSON.stringify(result));
                    } catch (e) {
                        console.log(e.message);
                    }
                }
                //
            }
        });



        if(typeof productId !== 'undefined') {
            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                console.log('INSERT HTML');
                ue.execCommand('inserthtml', $('#product-introduction').val());
                $('#product-introduction').val('');
            });

            $('#product-image').on('mousemove',function(){
                $('.product').css({'width': $(this).width()});
                $('.over-layer').css({'width':$(this).width(),'height':$(this).height(),'top':-$(this).height()}).show();

            });


        }





        /** ---------------------------------------------------------------------------------------------
         *
         * 图片展示及放大镜
         *
         * ----------------------------------------------------------------------------------------------*/
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            customDirectionNav: $(".custom-navigation a"),
            initDelay:100000000000,
            touch: false,
            itemWidth: 400
            //itemMargin: 5
        });

        $('#increment-amount').on('click',function(e){
            e.preventDefault();
            console.log('Increment');
        });

        function getRandom(n){
            return Math.floor(Math.random()*n+1)
        }




//         var inputp={
//             indexInput:0,
//
//             addNew:function(obj,stepNum){
//                 this.initNew(obj,stepNum);
//                 this.indexInput++;
//             },
//             getDigit:function(val,num){
//                 var digitNum=0;
//                 if(num.toString().split(".")[1]){
//                     digitNum=num.toString().split(".")[1].length;
//                 }
//
//                 if(digitNum>0){
//                     val=val.toFixed(digitNum);
//                 }
//                 return val;
//
//             },
//             initNew:function(obj,stepNum){
//
//
//
//
//                 var width = 84; //obj.width();
//                 var height = 24; //obj.height();
//                 var height1=height;
//
//                 var _root = this;
//                 width+=3;
//                 //height+=0;
//
//                 obj.css("border-style","none");
//                 obj.css("border-width","0px");
//
//                 obj.css("width", '84px' /*width-height1*2-7*/);
//                 obj.css("text-align","center");
//                 obj.css("outline","none");
//                 obj.css("vertical-align","middle");
//                 obj.css("line-height",height+"px");
//
//
//                 obj.wrap("<div id='"+obj.attr('id')+"T' style='overflow:hidden;width:"+width+"px;height:"+height+"px;border: 1px solid #CCC;'></div>");
//
//                 //obj.before("<div id='"+obj.attr('id')+"l'  onselectstart='return false;' style='-moz-user-select:none;cursor:pointer;text-align:center;width:"+height1+"px;height:"+height1+"px;line-height:"+height1+"px;border-right-width: 1px;border-right-style: solid;border-right-color: #CCC;float:left'>-</div>");
//                 //obj.after("<div id='"+obj.attr('id')+"r'  onselectstart='return false;' style='-moz-user-select:none;cursor:pointer;text-align:center;width:"+height1+"px;height:"+height1+"px;line-height:"+height1+"px;border-left-width: 1px;border-left-style: solid;border-left-color: #CCC;float:right'>+</div>");
//                 //$("#"+obj.attr('id')+"l").click(function(){
//                 // $("#decrement-amount").click(function(){
//                 //     _root.leftDo(obj,stepNum);
//                 // });
//                 // //$("#"+obj.attr('id')+"r").click(function(){
//                 // $("#increment-amount").click(function(){
//                 //     _root.rightDos(obj,stepNum);
//                 // });
//
//             },
//             leftDo:function(obj,stepNum){
//                 var val=this.formatNum(obj.val());
//                 val=Math.abs(val);
//                 val-=stepNum;
//
//                 val=this.getDigit(val,stepNum);
//
//                 if(val<0){
//                     val=0;
//                     obj.val(0);
//                 }else{
//                     this.moveDo(obj,val,true,stepNum);
//                 };
//
//
//             },
//             rightDos:function(obj,stepNum){
//
//                 var val=this.formatNum(obj.val());
//                 val=Math.abs(val);
//                 val+=stepNum;
//                 val=this.getDigit(val,stepNum);
//
//
//                 this.moveDo(obj,val,false,stepNum);
//
//             },
//             moveDo:function(obj,num,isup,stepNum){
//                 var startTop=0;
//                 var endTop=0;
//                 if(stepNum>=1){
//                     if(num.toString().split(".")[1]){
//                         num=num.toString().split(".")[0];
//                         obj.val(num);
//                     }
//                 }
//
//
//                 var num1=num;
//                 var lens1=num.toString().length;
//                 var divwidth=parseFloat(obj.css("font-size"))/2;
//                 if(isup){
//                     obj.val(num1);
//                     var isDecimal=false;
//                     for(i=lens1-1;i>=0;i--){
//                         var s=num.toString();
//                         var s1=s.substr(i,1);
//                         var s1num=parseFloat(s1);
//                         if(s1num!=9||isNaN(s1num)){
//                             if(isNaN(s1num)){
//                                 //num=parseFloat(s.substr(i-1,lens1-i));
// //							num++;
// //							num=this.getDigit(num,stepNum);
//                             }else{
//                                 num=parseFloat(s.substr(i,lens1-i));
//                                 num++;
//                                 break;
//                             }
//
//                         }
//                     }
//                     //num=this.getDigit(num,stepNum)
//                     startTop=0;
//                     endTop=-40;
//                 }else{
//                     var isDecimal=false;
//                     for(i=lens1-1;i>=0;i--){
//                         var s=num.toString();
//                         var s1=s.substr(i,1);
//                         var s1num=parseFloat(s1);
//                         if(s1num!=0||isNaN(s1num)){
//
//                             if(isNaN(s1num)){
//                                 //num=parseFloat(s.substr(i-1,lens1-i));
// //							num=this.getDigit(num,stepNum);
//                                 isDecimal=true;
//                             }else{
//                                 num=parseFloat(s.substr(i,lens1-i));
//                                 break;
//                             }
//                         }
//                     }
//                     if(isDecimal){
//                         num=this.getDigit(num,stepNum);
//                     }
//                     startTop=40;
//                     endTop=0;
//                 }
//
//
//                 if($("#"+obj.attr('id')+"Num").length <1){
//                     //background-color:#fff;
//                     var numstr=num.toString();
//                     var widths=divwidth*numstr.length;
//                     var stri="<div id='"+obj.attr('id')+"sy' style='position:relative;width:0px;height:0px'><div id='"+obj.attr('id')+"Num' style='width:"+widths+"px;z-index:100;position:absolute;height:"+obj.height()+"px;top:"+startTop+"px; line-height:"+obj.height()+"px;font-family: "+obj.css("font-family")+";font-size:"+obj.css("font-size")+";'>";
//                     for(i=0;i<numstr.length;i++){
//                         var nums=numstr.substr(i,1);
//                         if(nums=="."){
//                             stri+="<div style='float:left;width:"+divwidth+"px;'>&nbsp;";
//                         }else{
//                             stri+="<div style='float:left;width:"+divwidth+"px;background-color:#fff'>";
//                             stri+=nums;
//                         }
//                         stri+="</div>";
//                     }
//                     stri+="</div></div>";
//
//                     $("#"+obj.attr('id')+"T").prepend(stri);
//                     var leftOff=0;
//                     if(num1.toString().length-num.toString().length>0){
//                         leftOff=(divwidth*(num1.toString().length-num.toString().length))/2;
//                     }
//                     var pz=0;
//                     if(/msie/.test(navigator.userAgent.toLowerCase())){
//                         pz=1;
//                     }
//                     if(/firefox/.test(navigator.userAgent.toLowerCase())){
//                         pz=1;
//                     }
//                     if(/webkit/.test(navigator.userAgent.toLowerCase())){
//
//                     }
//                     if(/opera/.test(navigator.userAgent.toLowerCase())){
//                         pz=1;
//                     }
//                     var leftpx=(obj.width()/2)+obj.height()-($("#"+obj.attr('id')+"Num").width()/3)+1+leftOff+pz;
//                     $("#"+obj.attr('id')+"Num").css("left",leftpx);
//
//                     $("#"+obj.attr('id')+"Num").animate({
//                             top:endTop+'px'
//                             //,opacity:0.4
//                         },
//                         2300,
//                         function(){
//                             $("#"+obj.attr('id')+"sy").remove();
//                             if(isup){
//
//                             }else{
//                                 obj.val(num1);
//                             }
//                         });
//                 }
//             }
//             ,
//
//             formatNum:function(val){
//                 var val=parseFloat(val);
//                 if(isNaN(val)){
//                     val=0;
//                 }
//                 return val;
//             },
//
//         };
//
//
//         $(function(){
//             //inputp.addNew($("#inputs"),0.1);
//             inputp.addNew($("#amount"),1);
//         })





        //console.log('LI', $('.items'));

        // $('.product-attr li').on('mousemove', function () {
        //
        //     console.log("ATTR CLICKED");
        //     $('#amount').val(0);
        //     $('#dataNums').show().rollNumDaq({
        //         digit: 1,
        //         deVal: 0,
        //         isInit: true
        //     });
        //     $('#amount').val('');
        //     initVal = 0;
        //
        // });





    }); // End of document ready

</script>

</body>
</html>