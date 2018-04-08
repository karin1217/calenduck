<header id="kids_header">

    <div class="l-page-width clearfix">

        <div class="bg-level-1-left" id="bg-level-1-left"></div>
        <div class="bg-level-1-right" id="bg-level-1-right"></div>

        <ul class="kids_social">
            {{--<li style="width: 160px;text-align: center;padding-top: 5px;padding-left: 70px;">--}}
            <li>
                <select id="select-language" style="width: 100px;  margin-left: 250px;margin-top: 10px; height: 50px;">
                    <option value="zh-CN" imgPath="/images/lang_icons/flag_cn.png" {{ Session::get('language')=='zh-CN' ? 'selected="selected"' : '' }}>中文</option>
                    <option value="en" imgPath="/images/lang_icons/flag_gb.png" {{ Session::get('language')=='en' ? 'selected="selected"' : '' }}>英文</option>
                    <option value="ja" imgPath="/images/lang_icons/flag_jp.png" {{ Session::get('language')=='ja' ? 'selected="selected"' : '' }}>日文</option>
                    {{--<option value="ko" imgPath="/images/lang_icons/flag_kr.png" {{ Session::get('language')=='ko' ? 'selected="selected"' : '' }}>韩文</option>--}}
                </select>
            </li>
            {{--<li class="lang-btn-en"><button class="lang-btn btn" href="/language/en">English</button></li>--}}
            {{--<li class="lang-btn-cn"><button class="lang-btn btn" href="/language/zh-CN">Chinese</button></li>--}}
            {{--<li class="lang-btn-jp"><button class="lang-btn btn" href="/language/ja">Japanese</button></li>--}}
            {{--<li class="lang-btn-kr"><button class="lang-btn btn" href="/language/kr">Korean</button></li>--}}
            {{--<li>--}}
                {{--<form id="search-form" action="/" method="post" />--}}
                {{--<input type="text" value="" />--}}
                {{--<input type="submit" id="search-submit" />--}}
                {{--</form><!--/ #search-form-->--}}
            {{--</li>--}}
            {{--<li class="search"><a href="#" title="Search"></a></li>--}}
            {{--<li class="vimeo"><a href="#" title="Vimeo"></a></li>--}}
            {{--<li class="flickr"><a href="#" title="Flickr"></a></li>--}}
            {{--<li class="facebook"><a href="#" title="Facebook"></a></li>--}}
            {{--<li class="rss"><a href="#" title="RSS"></a></li>--}}
            {{--<li class="openbtn"><a href="#"></a></li>--}}
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
                    <a href="index.html">{{ trans('menu.main.home', [], Session::get('language')) }}</a>
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
                    <a href="color-variations.html">{{ trans('menu.main.feature', [], Session::get('language')) }}</a>
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
                    <a href="full-width.html">{{ trans('menu.main.page', [], Session::get('language')) }}</a>
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
                    <a href="portfolio-1col.html">{{ trans('menu.main.portfolio', [], Session::get('language')) }}</a>
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
                    <a href="blog-style-1.html">{{ trans('menu.main.blog', [], Session::get('language')) }}</a>
                    <ul>
                        <li><a href="blog-style-1.html">BlogStyle 1</a></li>
                        <li><a href="blog-details-1.html">BlogDetails 1</a></li>
                        <li><a href="blog-style-2.html">BlogStyle 2</a></li>
                        <li><a href="blog-details-2.html">BlogDetails 2</a></li>
                        <li><a href="blog-style-double-sidebars.html">DoubleSidebars</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">{{ trans('menu.main.contact', [], Session::get('language')) }}</a></li>

            </ul></nav><!-- #kids_main_nav -->

    </div><!--/ .l-page-width-->

</header><!--/ #kids_header-->