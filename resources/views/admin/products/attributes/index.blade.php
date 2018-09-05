@extends('layouts.main.frame')

@section('content')
    <style>
        .names {
            width: 100%;
            margin: 0 auto;
            /*border: solid 1px #DFDFDF;*/
            padding: 5px;
        }

        .names > .row {
            border: solid 1px #DFDFDF;
            border-bottom: 0;
        }
        .names > .row:last-child {
            border-bottom: solid 1px #DFDFDF;
        }
        .names > .row:nth-child(odd) {
            background-color: #EEEEEE;
        }


        .names > .row input {
            height: 30px;
        }

        .names > .row .input-group {
            /*height: 30px;*/
            width: 10em;
        }

        .names > .row button {
            width: 7em;
            height: 30px;
            margin: 15px;
        }

        .names > .row .attr-value {
            /*border-left: solid 1px #DFDFDF;*/
        }



        .names > .row .form-group {
            margin-bottom: 15px;
        }

        /*.names > .row .input-group-addon {*/
        /*background-color: #ef5b3052;*/
        /*}*/
        /*.names > .row .input-group-addon i{*/
        /*color: #fb5e33;*/
        /*}*/

        .names li {
            list-style: none;
            line-height: 2em;
            margin-bottom: 10px;
            /*border-bottom: solid 1px #DFDFDF ;*/
            padding: 5px;
        }

        .names li .gravatar {
            border-radius: 50%;
            width: 50px;
        }

        .names li:last-child {
            margin-bottom: 0;
            border-bottom: none;
        }

        .names li > form {
            display: inline-block;
            float: right;
            margin-top: 1%;
        }

        .attr-category {
            border: #DFDFDF 1px solid;
            width: 50%;
            padding: 1em;
            left: -.7em;
            position: relative;
        }

        .attr-category label {
            margin-right: 1em;
        }

        ul.pagination {
            width: 47%;
            float: right;
        }
    </style>

    <div class="container {{ route_class() }}-page">
        <div class="wrapper">
            <h2 class="title">商品属性</h2>

            @include('shared._messages')

            <div class="attr-category">
                <label for="category">选择分类{{$currentCategory->id}}</label>
                <select id="category" class="form-control" data-type="attributes" style="width: 250px">
                    @foreach($categories as $category)
                        <optgroup label="{{ $category['main']->name }}"></optgroup>
                        @foreach($category['sub'] as $cat)
                            <option value="{{ $cat->id }}" {{ ($cat->id==$currentCategory->id)?'selected="selected"':'' }}>{{ $cat->name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="names">

                @foreach ($productAttributeNames as $attrName)

                    <div class="row row-{{ $attrName->id }}">
                        <div class="col-md-3 attr-name">
                            <form class="form-inline">
                                <div class="form-group">
                                    {{--<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>--}}
                                    <div class="input-group">
                                        {{--<div class="input-group-addon">$</div>--}}
                                        <input type="text" class="form-control input-attr" data-type="name" id="input-attr-{{ $attrName->id }}" data-id="{{ $attrName->id }}" placeholder="属性名称" value="{{ $attrName->name }}">
                                        <div class="input-group-addon del-attr" data-type="name"><i class="fas fa-minus"></i></div>
                                    </div>
                                </div>
                                {{--<button type="button" class="btn btn-primary form-control"><i class="fas fa-plus"></i></button>--}}
                            </form>
                        </div>

                        <div class="col-md-9 attr-value">
                            <form class="form-inline" id="attr-value-{{ $attrName->id }}">
                                @foreach ($attrName->values as $attrValue)
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-attr" data-type="value" id="input-attr-{{ $attrValue->id }}" data-pid="{{ $attrName->id }}" data-id="{{ $attrValue->id }}" placeholder="属性值" value="{{$attrValue->value}}">
                                            <div class="input-group-addon del-attr" data-type="value"><i class="fas fa-minus"></i></div>
                                        </div>
                                    </div>
                                    {{--<button type="submit" class="btn btn-primary">Transfer cash</button>--}}
                                @endforeach
                            </form>
                            <button type="button" class="add-attr-value" data-type="value" data-pid="{{ $attrName->id }}"><i class="fas fa-plus"></i> 属性值</button>
                        </div>
                    </div>
                @endforeach

                <div class="row" id="op-row">
                    <div class="col-md-3 attr-name">
                        <form class="form-inline">
                            <button type="button" class="add-attr-name" data-type="name"><i class="fas fa-plus"></i> 属性名称</button>
                        </form>
                    </div>

                    {{--<div class="col-md-10 sub-category">--}}
                    {{--<form class="form-inline">--}}

                    {{--</form>--}}
                    {{--<button type="button" class="add-sub-category"><i class="fas fa-plus"></i> 二级分类</button>--}}
                    {{--</div>--}}
                </div>



            </div>

        </div>
    </div>

    <div class="row" id="tmp-row" style="display: none;">
        <div class="col-md-3 attr-name">
            <form class="form-inline">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control input-attr" data-type="name" id="input-attr-" data-id="" placeholder="属性名称" value="">
                        <div class="input-group-addon del-attr" data-type="name"><i class="fas fa-minus"></i></div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-9 attr-value">
            <form class="form-inline" id="attr-value-">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control input-attr" data-type="value" id="" data-pid="" data-id="" placeholder="属性值" value="">
                        <div class="input-group-addon del-attr" data-type="value"><i class="fas fa-minus"></i></div>
                    </div>
                </div>
            </form>
            <button type="button" class="add-attr-value" data-type="value" data-pid=""><i class="fas fa-plus"></i> 属性值</button>
        </div>
    </div>
    <div class="form-group" id="tmp-attr-value" style="display: none">
        <div class="input-group">
            <input type="text" class="form-control" id="" data-id="" placeholder="属性值">
            <div class="input-group-addon"><i class="fas fa-minus"></i></div>
        </div>
    </div>
@stop


