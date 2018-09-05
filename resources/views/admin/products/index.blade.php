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
            <h2 class="title">商品列表</h2>

            @include('shared._messages')

            <div class="attr-category">
                <label for="category">选择分类{{$currentCategory->id}}</label>
                <select id="category" class="form-control" data-type="products" style="width: 250px">
                    @foreach($categories as $category)
                        <optgroup label="{{ $category['main']->name }}"></optgroup>
                        @foreach($category['sub'] as $cat)
                            <option value="{{ $cat->id }}" {{ ($cat->id==$currentCategory->id)?'selected="selected"':'' }}>{{ $cat->name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div>

                <ul>
                    @foreach ($products as $product)
                        <li>{{$product->name}}</li>
                    @endforeach
                </ul>



            </div>

        </div>
    </div>
@stop


