@extends('layouts.main.frame')

@section('content')
    <style>
        .categories {
            width: 100%;
            margin: 0 auto;
            /*border: solid 1px #DFDFDF;*/
            padding: 5px;
        }

        .categories > .row {
            border: solid 1px #DFDFDF;
            border-bottom: 0;
        }
        .categories > .row:last-child {
            border-bottom: solid 1px #DFDFDF;
        }
        .categories > .row:nth-child(odd) {
            background-color: #EEEEEE;
        }


        .categories > .row input {
            height: 30px;
        }

        .categories > .row .input-group {
            /*height: 30px;*/
            width: 10em;
        }

        .categories > .row button {
            width: 7em;
            height: 30px;
            margin: 15px;
        }

        .categories > .row .sub-category {
            border-left: solid 1px #DFDFDF;
        }



        .categories > .row .form-group {
            margin-bottom: 15px;
        }

        /*.categories > .row .input-group-addon {*/
            /*background-color: #ef5b3052;*/
        /*}*/
        /*.categories > .row .input-group-addon i{*/
            /*color: #fb5e33;*/
        /*}*/

        .categories li {
            list-style: none;
            line-height: 2em;
            margin-bottom: 10px;
            /*border-bottom: solid 1px #DFDFDF ;*/
            padding: 5px;
        }

        .categories li .gravatar {
            border-radius: 50%;
            width: 50px;
        }

        .categories li:last-child {
            margin-bottom: 0;
            border-bottom: none;
        }

        .categories li > form {
            display: inline-block;
            float: right;
            margin-top: 1%;
        }

        ul.pagination {
            width: 47%;
            float: right;
        }
    </style>

    <div class="container {{ route_class() }}-page">
        <div class="wrapper">
            <h2 class="title">商品分类</h2>

            @include('shared._messages')

            <div class="categories">

                @foreach ($productCategory->topCategory() as $category)
                    <div class="row row-{{ $category->id }}">
                        <div class="col-md-3 top-category">
                            <form class="form-inline">
                                <div class="form-group">
                                    {{--<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>--}}
                                    <div class="input-group">
                                        {{--<div class="input-group-addon">$</div>--}}
                                        <input type="text" class="form-control input-category" id="input-category-{{ $category->id }}" data-id="{{ $category->id }}" placeholder="分类名称" value="{{ $category->name }}">
                                        <div class="input-group-addon del-category" data-type="top"><i class="fas fa-minus"></i></div>
                                    </div>
                                </div>
                                {{--<button type="button" class="btn btn-primary form-control"><i class="fas fa-plus"></i></button>--}}
                            </form>
                        </div>

                        <div class="col-md-9 sub-category">
                            <form class="form-inline" id="sub-category-{{ $category->id }}">
                                @foreach ($productCategory->subCategory($category->id) as $subCategory)
                                <div class="form-group">
                                    {{--<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>--}}
                                    <div class="input-group">
                                        {{--<div class="input-group-addon">$</div>--}}
                                        <input type="text" class="form-control input-category" id="input-category-{{ $subCategory->id }}" data-pid="{{ $category->id }}" data-id="{{ $subCategory->id }}" placeholder="分类名称" value="{{$subCategory->name}}">
                                        <div class="input-group-addon del-category" data-type="sub"><i class="fas fa-minus"></i></div>
                                    </div>
                                </div>
                                {{--<button type="submit" class="btn btn-primary">Transfer cash</button>--}}
                                @endforeach
                            </form>
                            <button type="button" class="add-sub-category" data-pid="{{ $category->id }}"><i class="fas fa-plus"></i> 二级分类</button>
                        </div>
                    </div>
                @endforeach

                    <div class="row" id="op-row">
                        <div class="col-md-3 top-category">
                            <form class="form-inline">
                                <button type="button" class="add-top-category"><i class="fas fa-plus"></i> 一级分类</button>
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
    <div class="form-group" id="tmp-category" style="display: none">
        <div class="input-group">
            <input type="text" class="form-control" id="" data-id="" placeholder="分类名称">
            <div class="input-group-addon"><i class="fas fa-minus"></i></div>
        </div>
    </div>
@stop


