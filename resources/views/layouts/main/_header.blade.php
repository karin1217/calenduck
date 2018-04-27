<!--header-->
<div class="header">
    <div class="header-bottom-in top-panel">
        <div class="container">
            <div class="header-bottom-on">
                <p class="wel"><a href="#">Welcome visitor you can login or create an account.</a></p>
                <div class="header-can">
                    <ul class="search-bar">
                        <li>
                            <ul class="social-in">
                                <li><a href="#"><i> </i></a></li>
                                <li><a href="#"><i class="facebook"> </i></a></li>
                                <li><a href="#"><i class="twitter"> </i></a></li>
                                <li><a href="#"><i class="skype"> </i></a></li>
                            </ul>
                        </li>

                        <li class="language">
                            <select id="select-language" style="width: 140px;">
                                @foreach(Config::get('languages') as $lang => $languageText)
                                    <option value="{{ $lang }}" imgPath="/images/lang_icons/flag_{{ $lang }}.png" {{ $lang != App::getLocale() ? "" : 'selected="selected"' }}>{{$languageText}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <div class="search">
                                <form>
                                    <input type="text" value="" placeholder="Search" >
                                    <input type="submit" value="">
                                </form>
                            </div>
                        </li>
                    </ul>

                    <div class="clearfix"> </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <ul class="switch-panel">

        <li class="openbtn"><a href="#" class="hidd"></a></li>
    </ul>
    <div class="header-top">
        <div class="container">
            <div class="header-top-in">
                <div class="logo">
                    <a href="index.html"><img src="/images/main/logo.png" alt=" " ></a>
                </div>
                <div class="header-in">
                    <ul class="icon1 sub-icon1">
                        <li><a href="wishlist.html">{{ __('pages.home.top_menu.wish_list') }} (0)</a> </li>
                        <li>
                            <a href="javascript:;">  {{ __('pages.home.top_menu.my_account.title') }}</a>
                            <ul class="sub-nav">
                                {{--@if(Auth::check())--}}
                                @guest
                                    <li><a href="/login">{{ __('pages.home.top_menu.my_account.sub.help') }}</a></li>
                                    <li><a href="/login">{{ __('pages.home.top_menu.my_account.sub.login') }}</a></li>
                                @else
                                    {{--@if(Auth::user()->is_admin)--}}
                                        {{--<li><a href="{{ route('users.index') }}">{{ __('pages.home.top_menu.my_account.sub.list') }}</a></li>--}}
                                    {{--@endif--}}
                                    <li><a href="{{ route('users.show', [Auth::user()]) }}">{{ __('pages.home.top_menu.my_account.sub.profile') }}</a></li>
                                    <li><a href="{{ route('users.edit', Auth::user()->id) }}">{{ __('pages.home.top_menu.my_account.sub.update') }}</a></li>
                                    <li>
                                        <a id="logout" href="javascript:;">{{ __('pages.home.top_menu.my_account.sub.logout') }}</a>

                                        <form id='logout-form' method="post" action="{{ route('logout') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            {{--<a href="javascript:;">{{ trans('menu.main.logout',[],Session::get('language')) }}</a>--}}
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </li>


                        <li >
                            <a href="#" > {{ __('pages.home.top_menu.shopping_cart') }}</a>

                            <ul class="sub-nav">
                                <li><a href="products.html">Sony(2)</a></li>
                                <li><a href="products.html">Android(4)</a></li>
                                <li><a href="products.html">Apple(7)</a></li>
                                <li><a href="products.html">Acer(53)</a></li>
                                <li><a href="products.html">HP(78)</a></li>
                                <li><a href="products.html">Intel(5)</a></li>
                            </ul>
                        </li>
                        <li > <a href="checkout.html" >{{ __('pages.home.top_menu.check_out') }}</a> </li>

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
                    <li class="active"><a href="/">{{ __('pages.home.nav.home') }}</a></li>
                    <li> <a href="#" >{{ __('pages.home.nav.shops') }}</a>
                        <ul class="drop">
                            <li><a href="products.html">Sony(2)</a></li>
                            <li><a href="products.html">Android(4)</a></li>
                            <li><a href="products.html">Apple(7)</a></li>
                            <li><a href="products.html">Acer(53)</a></li>
                            <li><a href="products.html">HP(78)</a></li>
                            <li><a href="products.html">Intel(5)</a></li>
                        </ul>
                    </li>
                    <li><a href="products.html" >  {{ __('pages.home.nav.categories') }}</a></li>
                    <li><a href="products.html" >{{ __('pages.home.nav.gallery') }}</a></li>
                    <li><a href="products.html" >{{ __('pages.home.nav.blog') }}</li>
                    <li><a href="products.html" >{{__('pages.home.nav.contact') }} </a></li>


                </ul>
            </div>
        </div>
    </div>
</div>