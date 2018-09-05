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



        // $('.upload-link').on('click',function(e){
            // e.preventDefault();
            // console.log('change-avatar is clicked',$(this).attr('data-type'));
            //
            // $('#uploadDialog').attr('data-type',$(this).attr('data-type')).modal('show');
        // });


        //     .on('hidden.bs.modal',function(){
        //     console.log('HIDE UPLOAD DIALOG');
        //     $('#imageEditDialog').modal('show');
        //     $('#imageEditDialog').modal('handleUpdate');
        // });

        // $('#edit-avatar').on('click',function(e){
        //     e.preventDefault();
        //     console.log('Edit avatar button');
        //     $('#imageEditDialog').modal('show');
        // });
        // //$('#imageEditDialog').on('shown.bs.modal'){

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





        {{--$('#imageEditDialog').on('show.bs.modal',function(e){--}}
            {{--console.log('SHOW IMAGE EDIT DIALOG');--}}
            {{--$('.docs-toggles').change();--}}
        {{--}).on('shown.bs.modal',function(e){--}}


            {{--$('#image-x').attr('src',$('.gravatar').attr('src'));--}}
            {{--$('#image-x').cropper('destroy').cropper(options);--}}
            {{--//$('#image-x').cropper(options);--}}

        {{--}).on('hidden.bs.modal',function(e){--}}

        {{--});--}}

        {{--$('#getCroppedCanvasDialog').on('show.bs.modal',function(e){--}}
            {{--console.log('Cropped canvas dialog show...');--}}
            {{--$('#imageEditDialog').modal('hide');--}}
        {{--}).on('shown.bs.modal',function(e){--}}
            {{--console.log('Cropped canvas dialog shown...');--}}
            {{--$('#getCroppedCanvasDialog').modal('handleUpdate');--}}
        {{--}).on('hidden.bs.modal',function(e){--}}
            {{--console.log('Cropped canvas dialog hidden...');--}}
            {{--$('#imageEditDialog').modal('show');--}}
            {{--$('#imageEditDialog').modal('handleUpdate');--}}
        {{--});--}}

        {{--function ui_single_update_active(element, active)--}}
        {{--{--}}
            {{--element.find('div.progress').toggleClass('d-none', !active);--}}
            {{--element.find('input[type="text"]').toggleClass('d-none', active);--}}

            {{--element.find('input[type="file"]').prop('disabled', active);--}}
            {{--element.find('.btn').toggleClass('disabled', active);--}}

            {{--element.find('.btn i').toggleClass('fa-circle-o-notch fa-spin', active);--}}
            {{--element.find('.btn i').toggleClass('fa-folder-o', !active);--}}
        {{--}--}}

        {{--function ui_single_update_progress(element, percent, active)--}}
        {{--{--}}
            {{--active = (typeof active === 'undefined' ? true : active);--}}

            {{--var bar = element.find('div.progress-bar');--}}

            {{--bar.width(percent + '%').attr('aria-valuenow', percent);--}}
            {{--bar.toggleClass('progress-bar-striped progress-bar-animated', active);--}}

            {{--if (percent === 0){--}}
                {{--bar.html('');--}}
            {{--} else {--}}
                {{--bar.html(percent + '%');--}}
            {{--}--}}
        {{--}--}}

        {{--function ui_single_update_status(element, message, color)--}}
        {{--{--}}
            {{--color = (typeof color === 'undefined' ? 'muted' : color);--}}

            {{--element.find('small.status').prop('class','status text-' + color).html(message);--}}
        {{--}--}}

        {{--/*--}}
   {{--* Some helper functions to work with our UI and keep our code cleaner--}}
   {{--*/--}}

{{--// Adds an entry to our debug area--}}
        {{--function ui_add_log(message, color)--}}
        {{--{--}}
            {{--var d = new Date();--}}

            {{--var dateString = (('0' + d.getHours())).slice(-2) + ':' +--}}
                {{--(('0' + d.getMinutes())).slice(-2) + ':' +--}}
                {{--(('0' + d.getSeconds())).slice(-2);--}}

            {{--color = (typeof color === 'undefined' ? 'muted' : color);--}}

            {{--var template = $('#debug-template').text();--}}
            {{--template = template.replace('%%date%%', dateString);--}}
            {{--template = template.replace('%%message%%', message);--}}
            {{--template = template.replace('%%color%%', color);--}}

            {{--$('#debug').find('li.empty').fadeOut(); // remove the 'no messages yet'--}}
            {{--$('#debug').prepend(template);--}}
        {{--}--}}

        {{--/*--}}
         {{--* For the sake keeping the code clean and the examples simple this file--}}
         {{--* contains only the plugin configuration & callbacks.--}}
         {{--*--}}
         {{--* UI functions ui_* can be located in:--}}
         {{--*   - assets/demo/uploader/js/ui-main.js--}}
         {{--*   - assets/demo/uploader/js/ui-multiple.js--}}
         {{--*   - assets/demo/uploader/js/ui-single.js--}}
         {{--*/--}}
        {{--$('#drag-and-drop-zone').dmUploader({ //--}}
            {{--headers: {--}}
                {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--},--}}
            {{--url: "{{ route('users.upload.avatar', Auth::user()) }}",--}}
            {{--maxFileSize: 9000000, // 3 Megs max--}}
            {{--multiple: false,--}}
            {{--dataType: 'json',--}}
            {{--allowedTypes: 'image/*',--}}
            {{--extFilter: ['jpg','jpeg','png','gif'],--}}
            {{--fieldName: 'uploadfile',--}}
            {{--onDragEnter: function(){--}}
                {{--// Happens when dragging something over the DnD area--}}
                {{--this.addClass('active');--}}
            {{--},--}}
            {{--onDragLeave: function(){--}}
                {{--// Happens when dragging something OUT of the DnD area--}}
                {{--this.removeClass('active');--}}
            {{--},--}}
            {{--onInit: function(){--}}
                {{--// Plugin is ready to use--}}
                {{--ui_add_log('Penguin initialized :)', 'info');--}}

                {{--this.find('input[type="text"]').val('');--}}

                {{--var img = this.find('img');--}}
                {{--img.attr('src', $('.gravatar').attr('src'));--}}
            {{--},--}}
            {{--onComplete: function(){--}}
                {{--// All files in the queue are processed (success or error)--}}
                {{--ui_add_log('All pending tranfers finished');--}}
            {{--},--}}
            {{--onNewFile: function(id, file){--}}
                {{--// When a new file is added using the file selector or the DnD area--}}
                {{--ui_add_log('New file added #' + id);--}}

                {{--// if (typeof FileReader !== "undefined"){--}}
                {{--//     var reader = new FileReader();--}}
                {{--//     var img = this.find('img');--}}
                {{--//--}}
                {{--//     reader.onload = function (e) {--}}
                {{--//         img.attr('src', e.target.result);--}}
                {{--//     }--}}
                {{--//     reader.readAsDataURL(file);--}}
                {{--//--}}
                {{--//     img.css('width','100%');--}}
                {{--// }--}}
            {{--},--}}
            {{--onBeforeUpload: function(id){--}}
                {{--// about tho start uploading a file--}}
                {{--ui_add_log('Starting the upload of #' + id);--}}
                {{--ui_single_update_progress(this, 0, true);--}}
                {{--ui_single_update_active(this, true);--}}

                {{--ui_single_update_status(this, 'Uploading...');--}}
            {{--},--}}
            {{--onUploadProgress: function(id, percent){--}}
                {{--// Updating file progress--}}
                {{--ui_single_update_progress(this, percent);--}}
            {{--},--}}
            {{--onUploadSuccess: function(id, data){--}}
                {{--var response = data;//JSON.stringify(data);--}}
                {{--console.log(data);--}}
                {{--console.log(response);--}}

                {{--if( ! response.success )--}}
                {{--{--}}
                    {{--ui_single_update_status(this, 'File type is not an image', 'danger');--}}
                    {{--return false;--}}
                {{--}--}}

                {{--fileMimeType = response.mimeType;--}}
                {{--console.log(fileMimeType);--}}

                {{--// A file was successfully uploaded--}}
                {{--ui_add_log('Server Response for file #' + id + ': ' + response.msg);--}}
                {{--ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');--}}

                {{--ui_single_update_active(this, false);--}}

                {{--// You should probably do something with the response data, we just show it--}}
                {{--//this.find('input[type="text"]').val(response);--}}
                {{--this.find('input[type="text"]').val(response.msg);--}}

                {{--$('.gravatar').attr('src','/' + response.image);--}}

                {{--ui_single_update_status(this, 'Upload completed.', 'success');--}}

                {{--$('#uploadDialog').modal('hide');--}}


            {{--},--}}
            {{--onUploadError: function(id, xhr, status, message){--}}
                {{--// Happens when an upload error happens--}}
                {{--ui_single_update_active(this, false);--}}
                {{--ui_single_update_status(this, 'Error: ' + message, 'danger');--}}
            {{--},--}}
            {{--onFallbackMode: function(){--}}
                {{--// When the browser doesn't support this plugin :(--}}
                {{--ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');--}}
            {{--},--}}
            {{--onFileSizeError: function(file){--}}
                {{--ui_single_update_status(this, 'File excess the size limit', 'danger');--}}

                {{--ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');--}}
            {{--},--}}
            {{--onFileTypeError: function(file){--}}
                {{--ui_single_update_status(this, 'File type is not an image', 'danger');--}}

                {{--ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');--}}
            {{--},--}}
            {{--onFileExtError: function(file){--}}
                {{--ui_single_update_status(this, 'File extension not allowed', 'danger');--}}

                {{--ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');--}}
            {{--}--}}
        {{--});--}}




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
            console.log(data.word);
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
            console.log($(this).data().pid);
            var pId = $(this).data().pid;
            var formId = '#attr-value-'+pId; //$(this).data().pid;
            var elForm = $(formId);
            var elDiv = elForm.find('div[class="form-group"]');

            console.log(elDiv);
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
                    console.log(response);
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

        // SKU动态生成时，需要暂存的数据
        var tempSkuData = [];
        var skuId;




        // 商品所有SKU一次性加载，作对比时待用
        getAllSku();

        function getAllSku(){
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/products/sku/image",
                method: "GET",
                data: {'id':$('#product-id').val()},
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
                                step.Creat_Table(response.data);
                                $('[data-toggle="tooltip"]').tooltip();
                            });



                            // 初始SKU表单
                            step.Creat_Table(response.data);
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
        }


        var step = {

            //SKU信息组合
            Creat_Table: function (skuList) {
                step.hebingFunction();
                //step.options.skuList = getAllSku();
                // console.log(skuList);
                var SKUObj = $(".attr-type");
                //var skuCount = SKUObj.length;//
                var arrayTile = [];//标题组数
                var arrayInfor = [];//盛放每组选中的CheckBox值的对象
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
                    var subOrder = [];
                    $("." + itemName + " input[type=checkbox]:checked").each(function (){
                        // Older
                        //order.push($(this).val());
                        order.push($(this).next().find('label').html()+'-|-'+$(this).val());


                        //subOrder[$(this).next().find('label').html()] = $(this).val();
                        //order.push(subOrder);
                        //console.log($(this).next().find('label').html());
                        // console.log(subOrder);
                    });

                    arrayInfor.push(order);
                    //console.log(arrayInfor);

                    if (order.join() == ""){
                        bCheck = false;
                    }

                    //console.log(arrayInfor);
                    // console.log('heee');
                    //var skuValue = SKUObj.find("li").eq(index).html();
                });
                //开始创建Table表
                if (bCheck == true) {
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
                    var zuheDate = step.doExchange(arrayInfor);
                    console.log(zuheDate);
                    if (zuheDate.length > 0) {
                        //创建行
                        $.each(zuheDate, function (index, item) {
                            var td_array = item.split(",");
                            var tr = $("<tr></tr>");
                            var td_sku = [];
                            tr.appendTo(tbody);
                            $.each(td_array, function (i, values) {
                                // console.log(values);
                                var class_data = values.split('-|-');
                                var td_value = class_data[0];
                                var td_data = class_data[1];
                                td_sku.push(td_data);
                                var td = $("<td data-id="+td_data+">" + td_value + "</td>");
                                td.appendTo(tr);
                            });
                            var td1 = $("<td><input name=\"Txt_PriceSon\" class=\"l-text\" type=\"text\" value=\"\"></td>");
                            td1.appendTo(tr);
                            var td2 = $("<td><input name=\"Txt_CountSon\" class=\"l-text\" type=\"text\" value=\"\"></td>");
                            td2.appendTo(tr);
                            var str_sku = td_sku.join('|');
                            //var image = step.getSKUImage(str_sku);

                            // console.log(skuList.skuList);
                            //if(typeof image === 'undefined' || image === null)
                            //var json = [{dd:'SB',AA:'东东',re1:123},{cccc:'dd',lk:'1qw'}];
                            for(idx=0;idx<skuList.skuList.length;idx++){
                                if(skuList.skuList[idx]['sku'] === str_sku && skuList.skuList[idx]['image'] != null) {
                                    var re = new RegExp('\\|','g');
                                    var td3 = $("<td data-sku="+str_sku+"><a id='upload-preview"+str_sku.replace(re,'-')+"' href='javascripr:;' data-toggle='tooltip' data-placement='top' data-html='true' title=\"<img src='"+skuList.skuList[idx]['image']+"' >\">图片预览</a> <a class='upload-link' href='javascripr:;' data-role='"+str_sku.replace(re,'-')+"' data-type='sku-image'>上传图片</a></td>");
                                    tempSkuData[str_sku.replace(re,'-')] = {'img': skuList.skuList[idx]['image']};
                                // <button type="button" class="btn btn-default" title="<img src='/images/loading.gif' />">Tooltip on top</button>
                                } else {
                                    var re = new RegExp('\\|','g');
                                    var td3 = $("<td data-sku="+str_sku+"><a id='upload-preview"+str_sku.replace(re,'-')+"' href='javascripr:;' data-toggle='tooltip' data-placement='top' data-html='true' title=''>图片预览</a> <a class='upload-link' href='javascripr:;' data-role='"+str_sku.replace(re,'-')+"' data-type='sku-image'>上传图片</a></td>");
                                }
                                //console.log(idx);
                                // for(var key in skuList.skuList[idx]){
                                //     if(key==='sku' && skuList.skuList[idx][key] === str_sku) {
                                //         //console.log(key + ':' + skuList.skuList[idx][key]);
                                //         if(skuList.skuList[idx][key])
                                //     }
                                // }
                            }

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
                } else{
                    //未全选中,清除表格
                    document.getElementById('sku-table').innerHTML="";
                }
            },
            //合并行
            hebingFunction: function () {
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
                    var newlen = len1 * len2;
                    var temp = new Array(newlen);
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
                    return step.doExchange(newArray);
                }
                else {
                    return doubleArrays[0];
                }
            },

        };
        //return step;



        var cropper={};
        $('#uploadDialog').on('shown.bs.modal', function() {


            // var rotation = function () {
            //     $("#upload-icon").rotate({
            //         angle: 0,
            //         animateTo: 360,
            //         duration: 3000,
            //         callback: rotation,
            //         easing: function (x, t, b, c, d) { // t: current time, b: begInnIng value, c: change In value, d: duration
            //             return c * (t / d) + b;
            //         }
            //     });
            // };


            console.log('Dialog Type', $(this).attr('data-type'));
            var sourceImg;
            var skuPreviewImg;
            skuId = $(this).attr('data-id');
            //console.log()
            switch ($(this).attr('data-type')) {
                case 'avatar-image':
                case 'product-image':
                    sourceImg = $('#product-image').attr('src');
                    break;
                case 'sku-image':
                default:
                    skuPreviewImg = $('#upload-preview' + skuId);
                    console.log('SKU ID',skuId);
                    console.log('SKU PREVIEW IMAGE:',skuPreviewImg);
                    // 搜索图片预览链接中的图片标签
                    var tooltipImg = skuPreviewImg.data('original-title');

                    console.log('TOOLTIP IMAGE:',tooltipImg);
                    // 正则匹配图片地址
                    //var preg = new RegExp('src=\'(.[^\>]+)?\'');
                    var preg = new RegExp("src='(.[^\\>]{1,}){0,1}'", "g");
                    var temp = preg.exec(tooltipImg);
                    //console.log('XYYY',temp[1]);
                    if (temp)
                        var tooltipImgSrc = temp[1];
                    else
                        var tooltipImgSrc = '';
                    // console.log(tooltipImgSrc);
                    sourceImg = tooltipImgSrc;

            }


            console.log("SSS", sourceImg);

            /**
             * -------------------------------------------------------------
             * 图像裁切
             * -------------------------------------------------------------
             */

                //var console = window.console || { log: function () {} };
            var URL = window.URL || window.webkitURL;
            var $image = $('#image-x');
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
                viewMode: 1,
                movable: false,
                // zoomable: false,
                cropBoxMovale: true,
                crop: function (e) {
                    $dataX.val(Math.round(e.detail.x));
                    $dataY.val(Math.round(e.detail.y));
                    $dataHeight.val(Math.round(e.detail.height));
                    $dataWidth.val(Math.round(e.detail.width));
                    $dataRotate.val(e.detail.rotate);
                    $dataScaleX.val(e.detail.scaleX);
                    $dataScaleY.val(e.detail.scaleY);
                }
            };

            // var fileExt;
            var uploadedImageName;
            var uploadedImageType;
            var uploadedImageURL;


            // // Tooltip
            //$('[data-toggle="tooltip"]').tooltip();

            //// Buttons
            // if (!$.isFunction(document.createElement('canvas').getContext)) {
            //     $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
            // }
            // if (typeof document.createElement('cropper').style.transition === 'undefined') {
            //     $('button[data-method="rotate"]').prop('disabled', true);
            //     $('button[data-method="scale"]').prop('disabled', true);
            // }

            // Download
            // console.log($download[0]);
            // if (typeof $download[0].download === 'undefined') {
            //     $download.addClass('disabled');
            // }

            // Options
            $('.docs-toggles').on('change', 'input', function () {
                var $this = $(this);
                var name = $this.attr('name');
                var type = $this.prop('type');
                var cropBoxData;
                var canvasData;

                if (!$image.data('cropper')) {
                    return;
                }

                if (type === 'checkbox') {
                    options[name] = $this.prop('checked');
                    cropBoxData = $image.cropper('getCropBoxData');
                    canvasData = $image.cropper('getCanvasData');

                    options.ready = function () {
                        $image.cropper('setCropBoxData', cropBoxData);
                        $image.cropper('setCanvasData', canvasData);
                    };
                } else if (type === 'radio') {
                    options[name] = $this.val();
                }

                $image.cropper('destroy').cropper(options);
            });


            // Methods
            $('.docs-controls').on('click', '[data-method]', function () {
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
                    //
                    switch (data.method) {
                        case 'rotate':
                            if (cropped && options.viewMode > 0) {
                                $image.cropper('clear');
                            }
                            //
                            break;

                        case 'getCroppedCanvas':
                            if (uploadedImageType === 'image/jpeg') {
                                if (!data.option) {
                                    data.option = {};
                                }
                                //
                                //data.option.fillColor = '#fff';
                            }
                            //
                            break;
                    }

                    result = $image.cropper(data.method, data.option, data.secondOption);

                    switch (data.method) {
                        case 'rotate':
                            if (cropped && options.viewMode > 0) {
                                $image.cropper('crop');
                            }
                            //
                            break;

                        case 'scaleX':
                        case 'scaleY':
                            $(this).data('option', -data.option);
                            break;

                        case 'getCroppedCanvas':
                            //console.log(this);return false;
                            if (result) {
                                // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
                                //cropper.getCroppedCanvas().toBlob(function (blob) {
                                var formData = new FormData();
                                formData.append('image', result.toDataURL(uploadedImageType));
                                //
                                // Use `jQuery.ajax` method
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: '/admin/products/uploads/'+$('#product-id').val(),
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
                                            console.log(response);
                                            // $image.cropper('destroy');
                                            $('#uploadDialog').modal('hide');

                                            skuPreviewImg.attr({'data-original-title':"<img src='"+response.data.path+"'>",'data-html':true});
                                            tempSkuData[skuId]= {'img': response.data.path};

                                            console.log('tempSkuData',tempSkuData);
                                            console.log('skuId',skuId);

                                            //skuPreviewImg.removeAttr('data-original-title');
                                            $('[data-toggle="tooltip"]').tooltip();
                                            //$('.gravatar').attr('src', '/' + data.image);
                                            console.log('Upload success');
                                        }
                                    },
                                    error: function () {
                                        console.log('Upload error');
                                    }
                                });
                                //});
                            }

                            // if (result) {
                            //     console.log('Crop Result',result);
                            //     // Bootstrap's Modal
                            //     $('#getCroppedCanvasDialog').modal().find('.modal-body').html(result);
                            //
                            //     if (!$download.hasClass('disabled')) {
                            //         download.download = uploadedImageName;
                            //         $download.attr('href', result.toDataURL(uploadedImageType));
                            //     }
                            // }

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

            // var $image = $('#image-x');
            // var options = {
            //     aspectRatio: 16 / 9,
            //     preview: '.img-preview',
            //     //scalable: false,
            //     //zoomable: false,
            //     minContainerWidth: 100,
            //     crop: function (event) {
            //         console.log(event.detail.x);
            //         console.log(event.detail.y);
            //         console.log(event.detail.width);
            //         console.log(event.detail.height);
            //         console.log(event.detail.rotate);
            //         console.log(event.detail.scaleX);
            //         console.log(event.detail.scaleY);
            //     }
            // };


            // var options = {
            //     aspectRatio: 1,
            //     preview: '.img-preview',
            //     viewMode: 1,
            //     crop: function (e) {
            //         $dataX.val(Math.round(e.detail.x));
            //         $dataY.val(Math.round(e.detail.y));
            //         $dataHeight.val(Math.round(e.detail.height));
            //         $dataWidth.val(Math.round(e.detail.width));
            //         $dataRotate.val(e.detail.rotate);
            //         $dataScaleX.val(e.detail.scaleX);
            //         $dataScaleY.val(e.detail.scaleY);
            //     }
            // };


            var iniData = {"x":0,"y":0,"width":256.00,"height":256.00,"rotate":0,"scaleX":1,"scaleY":1};
            $image.attr('src', sourceImg).cropper('destroy').cropper(options).cropper('setData', iniData);

            // Get the Cropper.js instance after initialized
            //cropper = $image.data('cropper');
            //const containerData = cropper.getContainerData();

            //// Zoom to 50% from the center of the container.
            // cropper.zoomTo(.5, {
            //     x: containerData.width / 2,
            //     y: containerData.height / 2,
            // });

            // cropper.zoomTo(.5);
            //$image.cropper(options);
            console.log(cropper);

        }).on('hidden.bs.modal',function(){
            // //$(this).find('div.vue-cropper').remove();
            // console.log('OPTIONS:',a.option);
            //a=1;

            // a.$refs.cropper.refresh();
            // a.$destroy();
            //cropper.reset();
            //a.$destroy();



        });





    });






</script>

</body>
</html>