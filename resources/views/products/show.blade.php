@extends('layouts.main.frame')

@section('content')
    <style>
        .t_container {
            height: 300px;
            width: 300px;
            overflow: hidden;
            zoom:1;
        }
        .jqzoom {
            position: relative;/*必须，使弹出框鼠标移动框位置固定对应位置*/
            height: 100%;
            width: 100%;
            /*border:1px solid #ccc;*/
            border-bottom: none;
        }
        .jqzoom img {
            display: block;
            border:none;
            height: 100%;
            width: 100%;
        }
        .b_container {
            height: 60px;
            width: 300px;
            overflow: hidden;
            zoom:1;
        }
        .b_container > img {
            display: block;
            /*border:1px solid #ccc;*/
            border-left: none;
            float: left;
            width: 20%;
            height: 60px;
        }
        .b_container > img:first-child {
            /*border-left: 1px solid #ccc;*/
        }



        /* main style */
        #zoom-zone{
            position: absolute;
            top:    -232px;
            left:   -150px;
        }

        div.zoomdiv {
            z-index:    999;
            position                : absolute;
            top:-150px;
            left:0px;
            width                   : 400px;
            height                  : 400px;
            background: #ffffff;
            border:1px solid #CCCCCC;
            display:none;
            text-align: center;
            overflow: hidden;
        }
        div.jqZoomPup {
            z-index                 : 999;
            visibility              : hidden;
            position                : absolute;
            top:0px;
            left:0px;
            width                   : 50px;
            height                  : 50px;
            border: 1px solid #aaa;
            background: #ffffff url(../images/zoomlens.gif) 50% top  no-repeat;
            opacity: 0.5;
            -moz-opacity: 0.5;
            -khtml-opacity: 0.5;
            filter: alpha(Opacity=50);
        }

        .available ul li {
            color: #747272;
            font-size: 1.0em;
        }

        .add-to-backup {
            display: none;
        }
        .stocks-backup {
            display: none;
        }
    </style>

    <style type="text/css">
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
            background: url(/images/img-sprite.png) no-repeat -50px -60px;
            top: -4px;
            position: absolute;
            right: 2px;
        }
        .product-attr li.text{margin:5px 10px 5px 0; height:23px;line-height:23px;text-indent:0;padding:0 23px;font-style:normal;}
        .product-attr li.img{ margin-right:10px;width:35px;height:35px; line-height:35px;text-align:center;}

        li{list-style: none;margin-right:10px;}
        li label{cursor: pointer;}
        .Father_Item0 li{float: left;}
        .Father_Item1 li{float: left;}
        .Father_Item2 li{float: left;}
        .Father_Item3 li{float: left;}

        table#process {
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
        }
        table#process th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #dedede;
        }
        table#process td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
        }

        .flex-control-thumbs {
            margin: 5px -2px 0;
            position: static;
            overflow: hidden;
        }

        .flex-control-thumbs li {
            width: 15.715%;
            float: left;
            margin: 2px;
        }
        .flex-control-thumbs li:hover{
            border:  #f95a32 2px solid;
        }

        .product-introduction {
            /*margin: 5px auto;*/
            text-align: center;
        }
        .product-introduction img {
            margin: 0 auto;
        }




        .product-amount{ overflow:hidden;}
        .product-amount .label {font: 1.0em '宋体';color: #747272;width: 50px;;padding-right: 10px;float: left; display:block;}
        .product-amount ul {float:left;width:300px;}
        .product-amount li{color:#747272;overflow:hidden;position:relative;float:left;text-align:center; vertical-align:middle; border:1px solid #747272;text-indent:0; cursor:pointer}
        .product-amount .input-group {
            width: 150px;
        }
        .product-amount .input-group-addon {
            height: 24px;
            border: 1px solid #747272;
            border-radius: 0;
            padding: 3px 9px;
            cursor: pointer;
        }
        .product-amount input {
            height: 24px;
            border-top: 1px solid #747272;
            border-bottom: 1px solid #747272;
            /*text-align: center;*/


        }

        .inrow{font-size:0;[;font-size:12px;];*font-size:0;[;letter-spacing:-3px;];*letter-spacing:normal;*word-spacing:-1px;}
        ul.dataNums.inrow {width:auto;left: 12.2px;}
        .inrow>li,.inrow span{display:inline-block;*display:inline;*zoom:1;font-size:14px;letter-spacing:normal;word-spacing:normal; }
        .dataNums{position: relative; top:0;z-index:10; display: block; width:100%;  margin-top: -37px; text-align:center;}
        /*.dataNums .dataOne{ width:61px; height:75px; margin: 0px 3px; text-align: center; background: url(../images/num-bg.png) no-repeat;}*/
        .dataNums .dataOne{ width:9px; height:20px; margin: 0 -0.6px; top:15px; text-align: center; border:none;}
        .dataNums .dataBoc {position: relative; width: 100%; height: 100%; overflow: hidden;}
        .dataNums .dataBoc .tt {position: absolute; top: 0;  left: 0; width: 100%;  height: 100%;}
        .dataNums .tt span{width:100%;height:100%; /*font:bold 54px/75px "Arial";color:#DED5DE;*/}
    </style>
    <div class="single">
        <div class="col-md-9 top-in-single">
            <div class="row">
                <div class="col-md-5 single-top">
                    <!-- start product_slider -->
                    <div class="flexslider">

                        <ul class="slides" style="width: max-content;">

                            @foreach($product->productSkus as $key=>$sku)
                                <li data-thumb="{{ $sku->image }}">
                                    <div class="thumb-image jqzoom"><img src="{{ $sku->image }}" jqimg="{{ $sku->image }}" data-imagezoom="true" class="img-responsive"></div>
                                </li>
                            @endforeach

                            {{--<li data-thumb="/images/main/si1.jpg">--}}
                                {{--<div class="thumb-image jqzoom"><img src="/images/main/si1.jpg" jqimg="/images/main/si1.jpg" data-imagezoom="true" class="img-responsive"></div>--}}
                            {{--</li>--}}
                            {{--<li data-thumb="/images/main/si2.jpg">--}}
                                {{--<div class="thumb-image jqzoom"> <img src="/images/main/si2.jpg" jqimg="/images/main/si2.jpg" data-imagezoom="true" class="img-responsive"> </div>--}}
                            {{--</li>--}}
                            {{--<li data-thumb="/images/main/si.jpg">--}}
                                {{--<div class="thumb-image jqzoom"> <img src="/images/main/si.jpg" jqimg="/images/main/si.jpg" data-imagezoom="true" class="img-responsive"> </div>--}}
                            {{--</li>--}}
                            {{--<li data-thumb="/images/main/si1.jpg">--}}
                                {{--<div class="thumb-image jqzoom"> <img src="/images/main/si1.jpg" jqimg="/images/main/si1.jpg" data-imagezoom="true" class="img-responsive"> </div>--}}
                            {{--</li>--}}
                        </ul>

                        <div id="zoom-zone"></div>

                        <div class="custom-navigation" style="display: none;">
                            <a href="#" class="flex-prev">Prev</a>
                            <div class="custom-controls-container"></div>
                            <a href="#" class="flex-next">Next</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- end product_slider -->

                </div>
                <div class="col-md-7 single-top-in">
                    <div class="single-para">
                        {{--<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>--}}
                        <h4>{{ $product->name }}</h4>

                        <div class="available">
                            <h6>选择规格 :</h6>
                            <ul class="select-sku">
                                <div id="panel-sel"></div>
                                <div class="product-amount"> <span class="label">数量</span>
                                    {{--<ul><li class="text" val="21"><span>短款</span><s></s></li></ul>--}}
                                    <div class="input-group">

                                        <div class="input-group-addon" id="decrement-amount"><span class="fa fa-minus"></span></div>
                                        <input type="text" class="form-control" id="amount" placeholder="" />
                                        <div id="dataNums"></div>
                                        <div class="input-group-addon" id="increment-amount"><span class="fa fa-plus"></span></div>

                                    </div>

                                </div>
                            </ul>




                            {{--<a href="#" class="hvr-shutter-in-vertical cart-to">Add to Cart</a>--}}
                            <div class="clearfix"></div>
                        </div>

                        <h5 class="stocks">库存 <span>{{ $product->totalStocks() }}</span> 件</h5>

                        <div class="para-grid">
                            <span  class="add-to" data-id="{{ $product->id }}">¥{{ ($product->minPrice() === $product->maxPrice()) ? ($product->minPrice()) : $product->minPrice() . ' ~ ¥' . $product->maxPrice() }}</span>
                            <span  class="add-to-backup"></span>
                            <a href="#" class="hvr-shutter-in-vertical cart-to">Add to Cart</a>
                            <div class="clearfix"></div>
                        </div>

                        <span class="stocks-backup"></span>


                        {{--<div id="panel">--}}
                            {{--<div id="panel_sku_list"><pre></pre></div>--}}
                            {{--<div id="panel_sel">--}}

                            {{--</div>--}}

                        {{--</div>--}}



                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 product-introduction" style="margin: 5px auto;"> {!! $product->introduction !!} </div>
                <a href="#" class="hvr-shutter-in-vertical ">More details</a>
            </div>
            <div class="row">
                <div class="clearfix"> </div>
                <div class="content-top-in">
                <div class="col-md-4 top-single">
                    <div class="col-md">
                        <img  src="/images/main/pic8.jpg" alt="" />
                        <div class="top-content">
                            <h5>Mascot Kitty - White</h5>
                            <div class="white">
                                <a href="#" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                <p class="dollar"><span class="in-dollar">$</span><span>2</span><span>0</span></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 top-single">
                    <div class="col-md">
                        <img  src="/images/main/pic9.jpg" alt="" />
                        <div class="top-content">
                            <h5>Mascot Kitty - White</h5>
                            <div class="white">
                                <a href="#" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                <p class="dollar"><span class="in-dollar">$</span><span>2</span><span>0</span></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 top-single-in">
                    <div class="col-md">
                        <img  src="/images/main/pic10.jpg" alt="" />
                        <div class="top-content">
                            <h5>Mascot Kitty - White</h5>
                            <div class="white">
                                <a href="#" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                <p class="dollar"><span class="in-dollar">$</span><span>2</span><span>0</span></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="single-bottom">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#"><i> </i>Fusce feugiat</a></li>
                    <li><a href="#"><i> </i>Mascot Kitty</a></li>
                    <li><a href="#"><i> </i>Fusce feugiat</a></li>
                    <li><a href="#"><i> </i>Mascot Kitty</a></li>
                    <li><a href="#"><i> </i>Fusce feugiat</a></li>
                </ul>
            </div>
            <div class="single-bottom">
                <h4>Product Categories</h4>
                <ul>
                    <li><a href="#"><i> </i>feugiat(5)</a></li>
                    <li><a href="#"><i> </i>Fusce (4)</a></li>
                    <li><a href="#"><i> </i> feugiat (4)</a></li>
                    <li><a href="#"><i> </i>Fusce (4)</a></li>
                    <li><a href="#"><i> </i> feugiat(2)</a></li>
                </ul>
            </div>
            <div class="single-bottom">
                <h4>Product Categories</h4>
                <div class="product">
                    <img class="img-responsive fashion" src="/images/main/st1.jpg" alt="">
                    <div class="grid-product">
                        <a href="#" class="elit">Consectetuer adipiscing elit</a>
                        <span class="price price-in"><small>$500.00</small> $400.00</span>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="product">
                    <img class="img-responsive fashion" src="/images/main/st2.jpg" alt="">
                    <div class="grid-product">
                        <a href="#" class="elit">Consectetuer adipiscing elit</a>
                        <span class="price price-in"><small>$500.00</small> $400.00</span>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="product">
                    <img class="img-responsive fashion" src="/images/main/st3.jpg" alt="">
                    <div class="grid-product">
                        <a href="#" class="elit">Consectetuer adipiscing elit</a>
                        <span class="price price-in"><small>$500.00</small> $400.00</span>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
@stop