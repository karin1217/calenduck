@extends('layouts.main.frame')

@section('title', '编缉商品')

@include('vendor.UEditor.assets')

@section('content')
    <style>
        .form-panel-product {
            width: 100%;
            margin: 0 auto;
        }

        .editForm .image-row {
            /*text-align: center;*/
            max-height: 400px;
        }

        .editForm textarea {
            resize: none;
        }

        .editForm .back-layer:hover .over-layer {
            display: block;
        }

        .editForm .product {
            max-width: 400px;
            /*max-height: 400px;*/
            margin: 0 auto;
            /*position: relative;*/
            /*border: 1px solid;*/
            padding:0;
            text-align: center;

        }
        .editForm .product a{
            text-decoration: none;
        }

        .editForm .product-img {
            max-width: 100%;
            /*width: 256px;*/
        }

        .editForm .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 0;
            line-height: 1.6;
            background-color: #f5f8fa;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: border 0.2s ease-in-out;
            transition: border 0.2s ease-in-out;
        }

        .over-layer {
            background: rgba(0, 0, 0, 0.52);
            position: relative;
            /*top: -201px;*/
            display: none;
            /*max-width: 201px;*/
            /*height: 201px;*/
            padding: 5em 0 0;
            border-radius: 4px;

            /*left: 156px;*/
        }

        .over-layer span{
            background: rgb(238,238,238);
            background: -moz-linear-gradient(top, rgba(238,238,238,1) 46%, rgba(208,208,208,1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(46%,rgba(238,238,238,1)), color-stop(100%,rgba(208,208,208,1)));
            background: -webkit-linear-gradient(top, rgba(238,238,238,1) 46%,rgba(208,208,208,1) 100%);
            background: -o-linear-gradient(top, rgba(238,238,238,1) 46%,rgba(208,208,208,1) 100%);
            background: -ms-linear-gradient(top, rgba(238,238,238,1) 46%,rgba(208,208,208,1) 100%);
            background: linear-gradient(to bottom, rgba(238,238,238,1) 46%,rgba(208,208,208,1) 100%);
            color: #747272;
            font-size: 1em;
            padding: 0.5em 0;
            display: block;
            width: 66%;
            margin: 0 auto 1em;
            text-align: center;
            border-radius: 5px;
            font-weight: 600;
            line-height: 1.4em;
        }
        .over-layer span:hover{
            background: rgb(252,94,53);
            background: -moz-linear-gradient(top, rgba(252,94,53,1) 55%, rgba(252,94,53,1) 55%, rgba(233,71,34,1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(55%,rgba(252,94,53,1)), color-stop(55%,rgba(252,94,53,1)), color-stop(100%,rgba(233,71,34,1)));
            background: -webkit-linear-gradient(top, rgba(252,94,53,1) 55%,rgba(252,94,53,1) 55%,rgba(233,71,34,1) 100%);
            background: -o-linear-gradient(top, rgba(252,94,53,1) 55%,rgba(252,94,53,1) 55%,rgba(233,71,34,1) 100%);
            background: -ms-linear-gradient(top, rgba(252,94,53,1) 55%,rgba(252,94,53,1) 55%,rgba(233,71,34,1) 100%);
            background: linear-gradient(to bottom, rgba(252,94,53,1) 55%,rgba(252,94,53,1) 55%,rgba(233,71,34,1) 100%);
            color: #fff;
        }



        /*
	Uploader:
	- These styles are the ones used on the examples. No needed to use it by any means.
	- It disables user selection to avoid some weird visuals in some browsers
	- It masks/hides the the file input behind a button
 */

        .dm-uploader {
            cursor: default;

            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .dm-uploader .btn {
            position: relative;
            overflow: hidden;
        }

        .dm-uploader .btn input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            border: solid transparent;
            width: 100%;
            height: 100%;
            opacity: .0;
            filter: alpha(opacity= 0);
            cursor: pointer;
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }
        form.dm-uploader {
            border: solid #f7f7f9 !important;
            padding: 1.5rem;
        }

        .form-row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }

        form .progress {
            height: 38px;
        }

        .progress {
            height: 1.5rem;
        }
        .mb-2, .my-2 {
            margin-bottom: .5rem!important;
        }
        .d-none {
            display: none!important;
        }
        .progress {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: .25rem;
        }
        .progress-bar {
            /*float: left;*/
            /*width: 0%;*/
            /*height: 100%;*/
            /*font-size: 12px;*/
            line-height: 38px;
        }
        .img-thumbnail {
            padding: .25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            max-width: 100%;
            height: auto;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }
        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0,0,0,.03);
            border-bottom: 1px solid rgba(0,0,0,.125);
        }






        .btn {
            padding-left: .75rem;
            padding-right: .75rem;
        }

        label.btn {
            margin-bottom: 0;
        }

        .d-flex > .btn {
            flex: 1;
        }

        .carbonads {
            border-radius: .25rem;
            border: 1px solid #ccc;
            font-size: .875rem;
            overflow: hidden;
            padding: 1rem;
        }

        .carbon-wrap {
            overflow: hidden;
        }

        .carbon-img {
            clear: left;
            display: block;
            float: left;
        }

        .carbon-text,
        .carbon-poweredby {
            display: block;
            margin-left: 140px;
        }

        .carbon-text,
        .carbon-text:hover,
        .carbon-text:focus {
            color: #fff;
            text-decoration: none;
        }

        .carbon-poweredby,
        .carbon-poweredby:hover,
        .carbon-poweredby:focus {
            color: #ddd;
            text-decoration: none;
        }

        @media (min-width: 768px) {
            .carbonads {
                float: right;
                margin-bottom: -1rem;
                margin-top: -1rem;
                max-width: 360px;
            }
        }

        .footer {
            font-size: .875rem;
            overflow: hidden;
        }

        .heart {
            color: #ddd;
            display: block;
            height: 2rem;
            line-height: 2rem;
            margin-bottom: 0;
            margin-top: 1rem;
            position: relative;
            text-align: center;
            width: 100%;
        }

        .heart:hover {
            color: #ff4136;
        }

        .heart::before {
            border-top: 1px solid #eee;
            content: " ";
            display: block;
            height: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 50%;
        }

        .heart::after {
            background-color: #fff;
            content: "♥";
            padding-left: .5rem;
            padding-right: .5rem;
            position: relative;
            z-index: 1;
        }

        .img-container,
        .img-preview {
            background-color: #f7f7f7;
            text-align: center;
            width: 100%;
        }

        .img-container {
            margin-bottom: 1rem;
            max-height: 497px;
            min-height: 200px;
        }

        @media (min-width: 768px) {
            .img-container {
                min-height: 497px;
            }
        }

        .img-container > img {
            max-width: 100%;
        }

        .docs-preview {
            margin-right: -1rem;
        }

        .img-preview {
            float: left;
            margin-bottom: .5rem;
            margin-right: .5rem;
            overflow: hidden;
        }

        .img-preview > img {
            max-width: 100%;
        }

        .preview-lg {
            height: 9rem;
            width: 16rem;
        }

        .preview-md {
            height: 4.5rem;
            width: 8rem;
        }

        .preview-sm {
            height: 2.25rem;
            width: 4rem;
        }

        .preview-xs {
            height: 1.125rem;
            margin-right: 0;
            width: 2rem;
        }

        .docs-data > .input-group {
            margin-bottom: .5rem;
        }

        .docs-data .input-group-prepend .input-group-text {
            min-width: 4rem;
        }

        .docs-data .input-group-append .input-group-text {
            min-width: 3rem;
        }

        .docs-buttons > .btn,
        .docs-buttons > .btn-group,
        .docs-buttons > .form-control {
            margin-bottom: .5rem;
            margin-right: .25rem;
        }

        .docs-toggles > .btn,
        .docs-toggles > .btn-group,
        .docs-toggles > .dropdown {
            margin-bottom: .5rem;
            margin-top: .5rem;

        }

        .docs-tooltip {
            display: block;
            margin: -.5rem -.75rem;
            padding: .5rem .75rem;
        }

        .docs-tooltip > .icon {
            margin: 0 -.25rem;
            vertical-align: top;
        }

        .tooltip-inner {
            white-space: normal;
        }

        .btn-upload .tooltip-inner,
        .btn-toggle .tooltip-inner {
            /*white-space: nowrap;*/
        }

        .btn-toggle {
            padding: .5rem;
        }

        .btn-toggle > .docs-tooltip {
            /*margin: -.5rem;*/
            /*padding: .5rem;*/
        }

        @media (max-width: 400px) {
            .btn-group-crop {
                margin-right: -1rem!important;
            }

            .btn-group-crop > .btn {
                padding-left: .5rem;
                padding-right: .5rem;
            }

            .btn-group-crop .docs-tooltip {
                margin-left: -.5rem;
                margin-right: -.5rem;
                padding-left: .5rem;
                padding-right: .5rem;
            }
        }

        .docs-options .dropdown-menu {
            width: 100%;
        }

        .docs-options .dropdown-menu > li {
            font-size: .875rem;
            padding: .125rem 1rem;
        }

        .docs-options .dropdown-menu .form-check-label {
            display: block;
        }

        .docs-cropped .modal-body {
            text-align: center;
        }

        .docs-cropped .modal-body > img,
        .docs-cropped .modal-body > canvas {
            max-width: 100%;
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        /*.cropper-container {*/
            /*width: 100%;*/
            /*height: 500px;*/
        /*}*/

        img {
            max-width: 100%;
        }
        .cut {
            margin: auto;
            width: 800px;
            height: 800px;
            /*width: 800px;*/
            /*height: 800px;*/
            display: inline-block;
        }

        li[role="group"].select2-results__option {
            margin-left: 0;
        }
        li.select2-results__option {
            margin-left: 30px;
        }

        .ue-content {
            margin: 10px;
        }




        /*.show-preview {*/
            /*flex: 1;*/
            /*!*-webkit-flex: 1;*!*/
            /*!*display: flex;*!*/
            /*!*display: -webkit-flex;*!*/
            /*justify-content: center;*/
            /*-webkit-justify-content: center;*/
            /*!*display: inline-block;*!*/
            /*border: 1px solid #EEEEEE;*/
        /*}*/
        /*.show-preview .preview{*/
            /*overflow: hidden;*/
            /*border-radius: 50%;*/
            /*border:1px solid #cccccc;*/
            /*background: #cccccc;*/
            /*margin-left: 40px;*/

        /*}*/






    </style>

    <style type="text/css">
        #navtab1.table {
            width: 97%;
            max-width: 100%;
            margin-bottom: 22px;
            margin: 0 auto;
            /*border-radius: 5px;*/
        }
        .div-title {
            margin: 5px 0 0 15px;
        }
        ul,li{ padding:0px; margin:0px;}
        #panel{ width:500px; margin:30px auto;}

        .product-attr{ overflow:hidden;}
        .product-attr .label {font: 1.0em '宋体';color: #747272;width: 50px;;padding-right: 10px;float: left; display:block;}
        .product-attr ul {float:left;width:300px;}

        .product-attr li{color:#747272;overflow:hidden;position:relative;float:left;text-align:center; vertical-align:middle; border:1px solid #747272;text-indent:0; cursor:pointer}
        .product-attr li.b{border:1px dotted #CCCCCC;color:#DDD; pointer:none;}
        .product-attr li.b img {opacity:0.4;}
        .product-attr li.sel{ border:1px solid #fd5f36;color:#747272;}
        .product-attr li i.sel{
            width: 30px;
            height: 30px;
            background: url('/images/img-sprite.png') no-repeat -50px -60px;
            top: -4px;
            position: absolute;
            right: 2px;
        }
        .product-attr li.text{margin:5px 10px 5px 0; height:23px;line-height:23px;text-indent:0;padding:0 23px;font-style:normal;}
        .product-attr li.img{ margin-right:10px;width:35px;height:35px; line-height:35px;text-align:center;}

        li{
            list-style: none;
            /*margin-right:10px;*/
        }
        li label{cursor: pointer;}
        .Father_Item0 li{float: left;}
        .Father_Item1 li{float: left;}
        .Father_Item2 li{float: left;}
        .Father_Item3 li{float: left;}

        table#process {
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #beeaf2;
            border-collapse: collapse;
        }
        table#process th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #beeaf2;
            background-color: #D1E9F5;
        }
        table#process td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #beeaf2;
            background-color: #ffffff;
        }
    </style>
    <div class="wrapper">
        @include('shared._errors')

        <h2 class="title">编缉商品</h2>

        <div class="panel panel-info form-panel-product">
            <div class="panel-heading">修改商品内容</div>
            <div class="panel-body">

                <p id="info"></p>

                <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" class="editForm">
                    {{ csrf_field()  }}
                    {{ method_field('PATCH') }}

                    <div class="row image-row">
                        <div class="product">
                            <a href="{{ $product->image }}" target="_blank" class="back-layer" id="back-layer">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-img" id="product-image"/>
                                <div class="over-layer">
                                    <span id="change-img" class="upload-link" data-type="product-image" data-role="product-image">更改图片</span>
                                    {{--<span id="edit-avatar">编缉图片</span>--}}
                                </div>
                            </a>
                        </div>


                    </div>

                    <div class="row">
                        {{--<div class="col-md-9">--}}
                            <div>
                                <label for="name">商品名称 : </label>
                                <input id="name" type="text" name="name" class="form-control{{ $errors->has('name')?' error':'' }}" value="{{ $errors->has('name')?'':$product->name }}" placeholder="{{ $errors->first('name') }}">
                            </div>

                            <div>
                                <label for="category">商品分类 : </label>
                                <select id="category" class="form-control" data-type="sku">
                                    @foreach($categories as $category)
                                        <optgroup label="{{ $category['main']->name }}"></optgroup>
                                        @foreach($category['sub'] as $cat)
                                            <option value="{{ $cat->id }}" {{ ($cat->id==$currentCategory->id)?'selected="selected"':'' }}>{{ $cat->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        {{--</div>--}}
                        <div>
                            <label for="introduction" style="margin: 0 0 -10px 10px">商品简介 : </label>
                            {{--<textarea name="introduction" rows="5" class="form-control{{ $errors->has('introduction')?' error':'' }}" placeholder="{{ $errors->first('introduction') }}">{{ $errors->has('introduction')?'':$product->introduction }}</textarea>--}}
                            <!-- 编辑器容器 -->
                            <script id="container" class="ue-content" name="content" type="text/plain"></script>
                        </div>
                        <div class="div-title"><label>产品规格 : </label></div>
                        <div id="navtab1" style="border: 1px solid #bce8f1;" class="table">
                            <div title="扩展信息" tabid="tabItem3">
                                <div id="Div1">
                                    <div position="center">
                                        <div style="padding: 0 8px;margin-bottom: -1px;" class="div_content">
                                            <div class="div_contentlist">
                                            @foreach($attributes as $key=>$attribute)
                                                {{-- 属性名称 --}}
                                                <ul class="attr-type"><li>{{ $attribute->name }}</li></ul>

                                                <ul class="Father_Item{{ $key }}">
                                                @foreach($attribute->values as $subKey=>$valueObj)
                                                    <li class="li_width">
                                                        <label>
                                                            <div class="pretty p-default p-curve">
                                                                {{--<input type="radio" name="color" />--}}
                                                                <input id="Checkbox{{ $subKey }}" type="checkbox" class="chcBox_Width" value="{{ $valueObj->id }}" {{ in_array($valueObj->id,$skuIds)?'checked':'' }}/>
                                                                <div class="state p-success-o">
                                                                    <label>{{ $valueObj->value }}</label>
                                                                </div>
                                                            </div>
                                                            <span class="li_empty"  contentEditable="true"></span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                                </ul>
                                                <br/>
                                            @endforeach


                                            </div>
                                            <div class="div_contentlist2" style="margin: 0 -9px;">
                                                <ul>
                                                    <li><div id="sku-table"></div></li>
                                                </ul>
                                                {{--<ul><li><input type="button" id="Button1" class="l-button" value="提交"/></li></ul>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="submit">
                        <input id="save-edit" type="submit" value="{{ __('pages.user.edit.form.label.update') }}" >
                    </div>
                </form>
            </div>{{-- /panel-body --}}
        </div>{{-- /panel --}}
    </div>

    <input id="product-id" type="hidden" value="{{ $product->id }}">
    <input id="product-introduction" type="hidden" value="{{ $product->introduction }}">

    {{--@include('shared.image._canvas')--}}
    {{--@include('shared.image._upload')--}}
    @include('shared.image._crop')

@stop