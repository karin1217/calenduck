@extends('layouts.main.frame')

@section('content')
    <!---->
    <div class="container">
        <div class="content">
            <div class="content-top">
                <h3 class="future">FEATURED</h3>
                <div class="content-top-in">
                    <div class="col-md-3 md-col">
                        <div class="col-md">
                            <a href="single.html"><img  src="/images/main/pi.jpg" alt="" /></a>
                            <div class="top-content">
                                <h5><a href="single.html">Mascot Kitty - White</a></h5>
                                <div class="white">
                                    <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2 ">ADD TO CART</a>
                                    <p class="dollar"><span class="in-dollar">$</span><span>2</span><span>0</span></p>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 md-col">
                        <div class="col-md">
                            <a href="single.html"><img  src="/images/main/pi1.jpg" alt="" />	</a>
                            <div class="top-content">
                                <h5><a href="single.html">Bite Me</a></h5>
                                <div class="white">
                                    <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                    <p class="dollar"><span class="in-dollar">$</span><span>3</span><span>0</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 md-col">
                        <div class="col-md">
                            <a href="single.html"><img  src="/images/main/pi2.jpg" alt="" /></a>
                            <div class="top-content">
                                <h5><a href="single.html">Little Fella</a></h5>
                                <div class="white">
                                    <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                    <p class="dollar"><span class="in-dollar">$</span><span>5</span><span>0</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 md-col">
                        <div class="col-md">
                            <a href="single.html"><img  src="/images/main/pi3.jpg" alt="" /></a>
                            <div class="top-content">
                                <h5><a href="single.html">Astral Cruise</a></h5>
                                <div class="white">
                                    <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                    <p class="dollar"><span class="in-dollar">$</span><span>4</span><span>5</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!---->
            <div class="content-middle">
                <h3 class="future">BRANDS</h3>
                <div class="content-middle-in">
                    <ul id="flexiselDemo1">
                        <li><img src="/images/main/ap.png"/></li>
                        <li><img src="/images/main/ap1.png"/></li>
                        <li><img src="/images/main/ap2.png"/></li>
                        <li><img src="/images/main/ap3.png"/></li>
                        <li>
                            <div class="gravatar">
                                <img src="http://www.gravatar.com/avatar/7a951efe9454b9521a84478bdb525451?s=100">
                            </div>

                            <div class="name">
                                <a href="http://calenduck.test/users/1">karin1217</a>
                                5
                            </div>

                            <div class="time">
                                2005-01-23 21:16:24
                            </div>

                            <div class="text">
                                奶香扑鼻，他正在哼哈有声的锻炼。“我们可没有什么。”老族长，我带些人出去，小心一点，过来，带着笑意。他们。“最近不太对劲
                            </div>
                        </li>

                    </ul>
                    {{--<script type="text/javascript">--}}
                    {{--$(window).load(function() {--}}


                    {{--});--}}
                    {{--</script>--}}
                    {{--<script type="text/javascript" src="js/jquery.flexisel.js"></script>--}}

                </div>

                <h3 class="future">BLOGS</h3>
                <div class="content-middle-in">

                    @include('shared._feed')
                    {{--<ul id="flexiselDemo1">--}}
                        {{--<li><img src="/images/main/ap.png"/></li>--}}
                        {{--<li><img src="/images/main/ap1.png"/></li>--}}
                        {{--<li><img src="/images/main/ap2.png"/></li>--}}
                        {{--<li><img src="/images/main/ap3.png"/></li>--}}

                    {{--</ul>--}}
                </div>


            </div>
            <!---->
            <div class="content-bottom">
                <h3 class="future">LATEST</h3>
                <div class="content-bottom-in">
                    <ul id="flexiselDemo2">
                        <li>
                            <div class="col-md men">
                                <a href="single.html" class="compare-in "><img  src="/images/main/pi4.jpg" alt="" />
                                    <div class="compare in-compare">
                                        <span>Add to Compare</span>
                                        <span>Add to Wishlist</span>
                                    </div>
                                </a>
                                <div class="top-content bag">
                                    <h5><a href="single.html">Symbolic Bag</a></h5>
                                    <div class="white">
                                        <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                        <p class="dollar"><span class="in-dollar">$</span><span>4</span><span>0</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col-md men">
                                <a href="single.html" class="compare-in "><img  src="/images/main/pi5.jpg" alt="" />
                                    <div class="compare in-compare">
                                        <span>Add to Compare</span>
                                        <span>Add to Wishlist</span>
                                    </div>
                                </a>
                                <div class="top-content bag">
                                    <h5><a href="single.html">Interesting Read</a></h5>
                                    <div class="white">
                                        <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                        <p class="dollar"><span class="in-dollar">$</span><span>2</span><span>5</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col-md men">
                                <a href="single.html" class="compare-in "><img  src="/images/main/pi6.jpg" alt="" />
                                    <div class="compare in-compare">
                                        <span>Add to Compare</span>
                                        <span>Add to Wishlist</span>
                                    </div></a>
                                <div class="top-content bag">
                                    <h5><a href="single.html">The Carter</a></h5>
                                    <div class="white">
                                        <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                        <p class="dollar"><span class="in-dollar">$</span><span>1</span><span>0</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col-md men">
                                <a href="single.html" class="compare-in "><img  src="/images/main/pi7.jpg" alt="" />
                                    <div class="compare in-compare">
                                        <span>Add to Compare</span>
                                        <span>Add to Wishlist</span>
                                    </div></a>
                                <div class="top-content bag">
                                    <h5><a href="single.html">Onesie</a></h5>
                                    <div class="white">
                                        <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                        <p class="dollar"><span class="in-dollar">$</span><span>6</span><span>0</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="start">
                <li ><a href="#"><i></i></a></li>
                <li><span>1</span></li>
                <li class="arrow"><a href="#">2</a></li>
                <li class="arrow"><a href="#">3</a></li>
                <li class="arrow"><a href="#">4</a></li>
                <li class="arrow"><a href="#">5</a></li>
                <li ><a href="#"><i  class="next"> </i></a></li>
            </ul>
        </div>
    </div>
@stop



