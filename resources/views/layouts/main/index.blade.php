<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Home</title>
    {{--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />--}}
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{--<script src="js/jquery.min.js"></script>--}}
    <!-- Custom Theme files -->
    <!--theme-style-->
    {{--<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />--}}
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!--fonts-->
    {{--<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>--}}
    <!--//fonts-->
    {{--<script type="text/javascript" src="js/move-top.js"></script>--}}
    {{--<script type="text/javascript" src="js/easing.js"></script>--}}
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}" />




</head>
<body>
<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-in">
                <div class="logo">
                    <a href="index.html"><img src="/images/main/logo.png" alt=" " ></a>
                </div>
                <div class="header-in">
                    <ul class="icon1 sub-icon1">
                        <li  ><a href="wishlist.html">WISH LIST (0)</a> </li>
                        <li  ><a href="account.html">  MY ACCOUNT</a></li>
                        <li ><a href="#" > SHOPPING CART</a></li>
                        <li > <a href="checkout.html" >CHECKOUT</a> </li>
                        <li><div class="cart">
                                <a href="#" class="cart-in"> </a>
                                <span> 0</span>
                            </div>
                            <ul class="sub-icon1 list">
                                <h3>Recently added items(2)</h3>
                                <div class="shopping_cart">
                                    <div class="cart_box">
                                        <div class="message">
                                            <div class="alert-close"> </div>
                                            <div class="list_img"><img src="/images/main/14.jpg" class="img-responsive" alt=""></div>
                                            <div class="list_desc"><h4><a href="#">velit esse molestie</a></h4>1 x<span class="actual">
		                             $12.00</span></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="cart_box1">
                                        <div class="message1">
                                            <div class="alert-close1"> </div>
                                            <div class="list_img"><img src="/images/main/15.jpg" class="img-responsive" alt=""></div>
                                            <div class="list_desc"><h4><a href="#">velit esse molestie</a></h4>1 x<span class="actual">
		                             $12.00</span></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="total">
                                    <div class="total_left">CartSubtotal : </div>
                                    <div class="total_right">$250.00</div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="login_buttons">
                                    <div class="check_button"><a href="checkout.html">Check out</a></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="h_menu4">
                <a class="toggleMenu" href="#">Menu</a>
                <ul class="nav">
                    <li class="active"><a href="index.html"><i> </i>Desktops</a></li>
                    <li ><a href="#" >Laptops & Notebooks</a>
                        <ul class="drop">
                            <li><a href="products.html">Sony(2)</a></li>
                            <li><a href="products.html">Android(4)</a></li>
                            <li><a href="products.html">Apple(7)</a></li>
                            <li><a href="products.html">Acer(53)</a></li>
                            <li><a href="products.html">HP(78)</a></li>
                            <li><a href="products.html">Intel(5)</a></li>
                        </ul>
                    </li>
                    <li><a href="products.html" >  Tablets</a></li>
                    <li><a href="products.html" >Components</a></li>
                    <li><a href="products.html" >Software</a></li>
                    <li><a href="products.html" >Phones & PDAs </a></li>
                    <li><a href="products.html" >  Cameras  </a></li>
                    <li><a href="contact.html" >Contact </a></li>

                </ul>
                {{--<script type="text/javascript" src="js/nav.js"></script>--}}
            </div>
        </div>
    </div>
    <div class="header-bottom-in">
        <div class="container">
            <div class="header-bottom-on">
                <p class="wel"><a href="#">Welcome visitor you can login or create an account.</a></p>
                <div class="header-can">
                    <ul class="social-in">
                        <li><a href="#"><i> </i></a></li>
                        <li><a href="#"><i class="facebook"> </i></a></li>
                        <li><a href="#"><i class="twitter"> </i></a></li>
                        <li><a href="#"><i class="skype"> </i></a></li>
                    </ul>
                    <div class="down-top">
                        <select class="in-drop">
                            <option value="Dollars" class="in-of">Dollars</option>
                            <option value="Euro" class="in-of">Euro</option>
                            <option value="Yen" class="in-of">Yen</option>
                        </select>
                    </div>
                    <div class="search">
                        <form>
                            <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '';}" >
                            <input type="submit" value="">
                        </form>
                    </div>

                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
<div class="banner-mat">
    <div class="container">
        <div class="banner">

            <!-- Slideshow 4 -->
            <div class="slider">
                <ul class="rslides" id="slider1">
                    <li><img src="/images/main/banner.jpg" alt="">
                    </li>
                    <li><img src="/images/main/banner1.jpg" alt="">
                    </li>
                    <li><img src="/images/main/banner.jpg" alt="">
                    </li>
                    <li><img src="/images/main/banner2.jpg" alt="">
                    </li>
                </ul>
            </div>

            <div class="banner-bottom">
                <div class="banner-matter">
                    <p>Childish Gambino - Camp Now Available for just $9.99</p>
                    <a href="single.html" class="hvr-shutter-in-vertical ">Purchase</a>
                </div>
                <div class="purchase">
                    <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2 ">Purchase</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //slider-->
    </div>
</div>
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

                </ul>
                {{--<script type="text/javascript">--}}
                    {{--$(window).load(function() {--}}


                    {{--});--}}
                {{--</script>--}}
                {{--<script type="text/javascript" src="js/jquery.flexisel.js"></script>--}}

            </div>
        </div>
        <!---->
        <div class="content-bottom">
            <h3 class="future">LATEST</h3>
            <div class="content-bottom-in">
                <ul id="flexiselDemo2">
                    <li><div class="col-md men">
                            <a href="single.html" class="compare-in "><img  src="/images/main/pi4.jpg" alt="" />
                                <div class="compare in-compare">
                                    <span>Add to Compare</span>
                                    <span>Add to Wishlist</span>
                                </div></a>
                            <div class="top-content bag">
                                <h5><a href="single.html">Symbolic Bag</a></h5>
                                <div class="white">
                                    <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                    <p class="dollar"><span class="in-dollar">$</span><span>4</span><span>0</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div></li>
                    <li><div class="col-md men">
                            <a href="single.html" class="compare-in "><img  src="/images/main/pi5.jpg" alt="" />
                                <div class="compare in-compare">
                                    <span>Add to Compare</span>
                                    <span>Add to Wishlist</span>
                                </div></a>
                            <div class="top-content bag">
                                <h5><a href="single.html">Interesting Read</a></h5>
                                <div class="white">
                                    <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                                    <p class="dollar"><span class="in-dollar">$</span><span>2</span><span>5</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div></li>
                    <li><div class="col-md men">
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
                        </div></li>
                    <li><div class="col-md men">
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
                        </div></li>

                </ul>
                {{--<script type="text/javascript">--}}
                    {{--$(window).load(function() {--}}
                        {{--$("#flexiselDemo2").flexisel({--}}
                            {{--visibleItems: 4,--}}
                            {{--animationSpeed: 1000,--}}
                            {{--autoPlay: true,--}}
                            {{--autoPlaySpeed: 3000,--}}
                            {{--pauseOnHover: true,--}}
                            {{--enableResponsiveBreakpoints: true,--}}
                            {{--responsiveBreakpoints: {--}}
                                {{--portrait: {--}}
                                    {{--changePoint:480,--}}
                                    {{--visibleItems: 1--}}
                                {{--},--}}
                                {{--landscape: {--}}
                                    {{--changePoint:640,--}}
                                    {{--visibleItems: 2--}}
                                {{--},--}}
                                {{--tablet: {--}}
                                    {{--changePoint:768,--}}
                                    {{--visibleItems: 3--}}
                                {{--}--}}
                            {{--}--}}
                        {{--});--}}

                    {{--});--}}
                {{--</script>--}}
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
<!---->
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="col-md-4 footer-in">
                <h4><i> </i>Suspendisse sed</h4>
                <p>Aliquam dignissim porttitor tortor non fermentum. Curabitur in magna lectus. Duis sed eros diam. Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
            <div class="col-md-4 footer-in">
                <h4><i class="cross"> </i>Suspendisse sed</h4>
                <p>Aliquam dignissim porttitor tortor non fermentum. Curabitur in magna lectus. Duis sed eros diam. Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
            <div class="col-md-4 footer-in">
                <h4><i class="down"> </i>Suspendisse sed</h4>
                <p>Aliquam dignissim porttitor tortor non fermentum. Curabitur in magna lectus. Duis sed eros diam. Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!---->
    <div class="footer-middle">
        <div class="container">
            <div class="footer-middle-in">
                <h6>About us</h6>
                <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
            </div>
            <div class="footer-middle-in">
                <h6>Information</h6>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Delivery Information</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="footer-middle-in">
                <h6>Customer Service</h6>
                <ul>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Site Map</a></li>
                </ul>
            </div>
            <div class="footer-middle-in">
                <h6>My Account</h6>
                <ul>
                    <li><a href="account.html">My Account</a></li>
                    <li><a href="#">Order History</a></li>
                    <li><a href="wishlist.html">Wish List</a></li>
                    <li><a href="#">Newsletter</a></li>
                </ul>
            </div>
            <div class="footer-middle-in">
                <h6>Extras</h6>
                <ul>
                    <li><a href="#">Brands</a></li>
                    <li><a href="#">Gift Vouchers</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Specials</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <p class="footer-class">Copyright &copy; 2017-{{ date('Y') }}. <a href="/home">Calenduck</a> All rights reserved.</p>
    {{--<script type="javascript" src="{{ asset('js/main.js') }}"></script>--}}
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('js/main.js') }}"></script>
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function() {--}}





        {{--});--}}
    {{--</script>--}}

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!--slider-script-->
    {{--<script src="js/responsiveslides.min.js"></script>--}}

    <!--//slider-script-->
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</div>
</body>
</html>