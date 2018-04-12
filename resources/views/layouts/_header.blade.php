<header id="kids_header">

    <div class="l-page-width clearfix">

        <div class="bg-level-1-left" id="bg-level-1-left"></div>
        <div class="bg-level-1-right" id="bg-level-1-right"></div>

        <ul class="kids_social">
            <li>
                <select id="select-language" style="width: 100px;  margin-left: 250px;margin-top: 10px; height: 50px;">
                    @foreach(Config::get('languages') as $lang => $languageText)
                        <option value="{{ $lang }}" imgPath="/images/lang_icons/flag_{{ $lang }}.png" {{ $lang != App::getLocale() ? "" : 'selected="selected"' }}>{{$languageText}}</option>
                    @endforeach
                </select>
            </li>
        </ul><!-- .kids_social -->

        <div id="kids_logo_block">
            <a id="kids_logo_text" href="index.html" title="Happy Kids">
                <img src="/images/logo.png" alt="" />
            </a>
        </div><!--/ #kids_logo_block-->

        {{--<nav id="kids_main_nav" style="width: 100%;position: absolute;top: 61px;">--}}
        <nav id="kids_main_nav">

            {{--<ul class="clearfix" style="position: absolute;right: 20px;">--}}
            <ul class="clearfix">
                <li class="current-menu-item">
                    <a href="index.html">{{ __('menu.main.home') }}</a>
                    <ul>
                        <li class="current-menu-item"><a href="index.html">Nivo Slider</a></li>
                        <li><a href="anything-slider.html">Anything Slider</a></li>
                        <li><a href="lofslidernews.html">LofJsliderNews</a></li>
                        <li><a href="index-with-slogan.html">With Slogan</a></li>
                        <li><a href="index-with-scrollbar.html">With Scrollbar</a></li>
                        <li><a href="index-video-slider.html">Video Slider</a></li>
                        <li><a href="index-static-image.html">Static Image</a></li>
                    </ul>
                </li>
                <li>
                    <a href="color-variations.html">{{ __('menu.main.feature') }}</a>
                    <ul>
                        <li><a href="color-variations.html">6 Color Variations</a></li>
                        <li>
                            <a href="grids-showcase.html">Content elements</a>
                            <ul>
                                <li><a href="grids-showcase.html">Grids showcase</a></li>
                                <li><a href="image-frames.html">Image frames</a></li>
                                <li><a href="content-elements.html">Content elements</a></li>
                                <li><a href="video.html">Video</a></li>
                                <li><a href="text-and-headings.html">Text and headings</a></li>
                            </ul>
                        </li>
                        <li><a href="pricing-tables.html">Pricing tables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="full-width.html">{{ __('menu.main.page') }}</a>
                    <ul>
                        <li><a href="full-width.html">Full Width Page</a></li>
                        <li><a href="double-sidebars.html">Double Sidebars</a></li>
                        <li><a href="right-navigation.html">Right Navigation</a></li>
                        <li><a href="left-navigation.html">Left Navigation</a></li>
                        <li><a href="right-nav-sidebar.html">Right Nav + Sidebar</a></li>
                        <li><a href="left-nav-sidebar.html">Left Nav + Sidebar</a></li>
                        <li><a href="sitemap.html">Sitemap</a></li>
                        <li><a href="404page.html">404 Page</a></li>
                    </ul>
                </li>
                <li>
                    <a href="portfolio-1col.html">{{ __('menu.main.portfolio') }}</a>
                    <ul>
                        <li><a href="portfolio-1col.html">Portfolio 1 column</a></li>
                        <li><a href="portfolio-2col.html">Portfolio 2 columns</a></li>
                        <li><a href="portfolio-3col.html">Portfolio 3 columns</a></li>
                        <li><a href="portfolio-4col.html">Portfolio 4 columns</a></li>
                        <li><a href="portfolio-single.html">Portfolio Single</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="gallery-sidebar.html">Gallery + Sidebar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="blog-style-1.html">{{ __('menu.main.blog') }}</a>
                    <ul>
                        <li><a href="blog-style-1.html">BlogStyle 1</a></li>
                        <li><a href="blog-details-1.html">BlogDetails 1</a></li>
                        <li><a href="blog-style-2.html">BlogStyle 2</a></li>
                        <li><a href="blog-details-2.html">BlogDetails 2</a></li>
                        <li><a href="blog-style-double-sidebars.html">DoubleSidebars</a></li>
                    </ul>
                </li>


                @if(Auth::check())
                    <li>
                        <a href="{{ route('users.show', Auth::user()->id) }}}">{{ __('menu.main.personal_center') }}</a>
                        <ul>
                            <li><a href="{{ route('users.edit', Auth::user()->id) }}">{{ __('title.pages.profile') }}</a></li>
                            <li><a id="logout" href="javascript:;">{{ __('menu.main.logout') }}</a></li>
                        </ul>
                    </li>
                    <form id='logout-form' method="post" action="{{ route('logout') }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        {{--<a href="javascript:;">{{ trans('menu.main.logout',[],Session::get('language')) }}</a>--}}
                    </form>
                @else
                    <li><a href="/login">{{ __('menu.main.help') }}</a></li>
                    <li><a href="/login">{{ __('menu.main.login') }}</a></li>
                @endif


            </ul>
        </nav><!-- #kids_main_nav -->

    </div><!--/ .l-page-width-->

</header><!--/ #kids_header-->