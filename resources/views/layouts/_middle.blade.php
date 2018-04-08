
<div id="kids_middle_container">

    <div class="kids_top_content">

        <div class="kids_top_content_head">

            <div class="kids_top_content_head_body"></div>

        </div><!-- .kids_top_content_head -->

        <div class="kids_top_content_middle">


            @if(isset($hasMiddle))
            <div class="l-page-width">

                <section class="kids_posts_container clearfix">

                    <article class="kids_post_block l-grid-4">
                        <h1><img class="icon" src="images/icons/sample-icon1.png" alt="" /><a class="link" href="#">Playground</a></h1>
                        <div class="kids_post_content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis mollis lac us a egestas.</p> <h3 class="l-float-right"><a class="link" href="">Learn More</a></h3>
                        </div>
                    </article>

                    <article class="kids_post_block l-grid-4">
                        <h1><img class="icon" src="images/icons/sample-icon2.png" alt="" /><a class="link" href="#">Entertainment</a></h1>
                        <div class="kids_post_content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dolor sit amet, consectetur adipiscingus a egestas. </p><h3 class="l-float-right"><a class="link" href="">Learn More</a></h3>
                        </div>
                    </article>

                    <article class="kids_post_block l-grid-4">
                        <h1><img class="icon" src="images/icons/sample-icon3.png" alt="" /><a class="link" href="#">Environment</a></h1>
                        <div class="kids_post_content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis mollis lacus a egestas. </p><h3 class="l-float-right"><a class="link" href="">Learn More</a></h3>
                        </div>
                    </article>

                </section><!-- .kids_posts_container -->

            </div><!--/ l-page-width-->
            @endif

        </div><!-- .kids_top_content_middle -->

        <div class="kids_top_content_footer"></div>

    </div><!-- .kids_top_content -->


    @yield('content')

    @if(isset($isShowRecent))
    <div class="kids_bottom_content">

        <div class="l-page-width">

            <div class="kids_bottom_content_container clearfix">

                <div class="recent_projects">

                    <h3 class="section-title">Recent Projects</h3>

                    <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;"><div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;"><ul class="projects_carousel clearfix jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 2012px;">

                                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" jcarouselindex="1" style="float: left; list-style: none;">
                                    <div class="border-shadow">
                                        <figure>
                                            <a class="prettyPhoto kids_picture" href="images/sample_1.jpg"><img src="images/temp/temp_thumb_1.jpg" alt=""><span class="kids_curtain">&nbsp;</span></a>
                                        </figure>
                                    </div>
                                    <h1 class="title">Project Name</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, sectetut, sed diam nonummy nibh
                                        euismod tincidnt ut laoreet
                                    </p>
                                    <footer class="aligncenter">
                                        <a href="#" class="button medium button-style1">More</a>
                                    </footer>
                                </li>

                                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal" jcarouselindex="2" style="float: left; list-style: none;">
                                    <div class="border-shadow">
                                        <figure>
                                            <a class="prettyPhoto kids_picture" href="images/sample_2.jpg"><img src="images/temp/temp_thumb_2.jpg" alt=""><span class="kids_curtain">&nbsp;</span></a>
                                        </figure>
                                    </div>
                                    <h1 class="title">Project Name</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, sectetut, sed diam nonummy nibh
                                        euismod tincidnt ut laoreet
                                    </p>
                                    <footer class="aligncenter">
                                        <a href="#" class="button medium button-style1">More</a>
                                    </footer>
                                </li>

                                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal" jcarouselindex="3" style="float: left; list-style: none;">
                                    <div class="border-shadow">
                                        <figure>
                                            <a class="prettyPhoto kids_picture" href="images/sample_3.jpg"><img src="images/temp/temp_thumb_3.jpg" alt=""><span class="kids_curtain">&nbsp;</span></a>
                                        </figure>
                                    </div>
                                    <h1 class="title">Project Name</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, sectetut, sed diam nonummy nibh
                                        euismod tincidnt ut laoreet
                                    </p>
                                    <footer class="aligncenter">
                                        <a href="#" class="button medium button-style1">More</a>
                                    </footer>
                                </li>

                                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal" jcarouselindex="4" style="float: left; list-style: none;">
                                    <div class="border-shadow">
                                        <figure>
                                            <a class="prettyPhoto kids_picture" href="images/sample_4.jpg"><img src="images/temp/temp_thumb_4.jpg" alt=""><span class="kids_curtain">&nbsp;</span></a>
                                        </figure>
                                    </div>
                                    <h1 class="title">Project Name</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, sectetut, sed diam nonummy nibh
                                        euismod tincidnt ut laoreet
                                    </p>
                                    <footer class="aligncenter">
                                        <a href="#" class="button medium button-style1">More</a>
                                    </footer>
                                </li>

                                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal" jcarouselindex="5" style="float: left; list-style: none;">
                                    <div class="border-shadow">
                                        <figure>
                                            <a class="prettyPhoto kids_picture" href="images/sample_1.jpg"><img src="images/temp/temp_thumb_1.jpg" alt=""><span class="kids_curtain">&nbsp;</span></a>
                                        </figure>
                                    </div>
                                    <h1 class="title">Project Name</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, sectetut, sed diam nonummy nibh
                                        euismod tincidnt ut laoreet
                                    </p>
                                    <footer class="aligncenter">
                                        <a href="#" class="button medium button-style1">More</a>
                                    </footer>
                                </li>

                                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal" jcarouselindex="6" style="float: left; list-style: none;">
                                    <div class="border-shadow">
                                        <figure>
                                            <a class="prettyPhoto kids_picture" href="images/sample_2.jpg"><img src="images/temp/temp_thumb_2.jpg" alt=""><span class="kids_curtain">&nbsp;</span></a>
                                        </figure>
                                    </div>
                                    <h1 class="title">Project Name</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, sectetut, sed diam nonummy nibh
                                        euismod tincidnt ut laoreet
                                    </p>
                                    <footer class="aligncenter">
                                        <a href="#" class="button medium button-style1">More</a>
                                    </footer>
                                </li>

                                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal" jcarouselindex="7" style="float: left; list-style: none;">
                                    <div class="border-shadow">
                                        <figure>
                                            <a class="prettyPhoto kids_picture" href="images/sample_3.jpg"><img src="images/temp/temp_thumb_3.jpg" alt=""><span class="kids_curtain">&nbsp;</span></a>
                                        </figure>
                                    </div>
                                    <h1 class="title">Project Name</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, sectetut, sed diam nonummy nibh
                                        euismod tincidnt ut laoreet
                                    </p>
                                    <footer class="aligncenter">
                                        <a href="#" class="button medium button-style1">More</a>
                                    </footer>
                                </li>

                                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal" jcarouselindex="8" style="float: left; list-style: none;">
                                    <div class="border-shadow">
                                        <figure>
                                            <a class="prettyPhoto kids_picture" href="images/sample_4.jpg"><img src="images/temp/temp_thumb_4.jpg" alt=""><span class="kids_curtain">&nbsp;</span></a>
                                        </figure>
                                    </div>
                                    <h1 class="title">Project Name</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, sectetut, sed diam nonummy nibh
                                        euismod tincidnt ut laoreet
                                    </p>
                                    <footer class="aligncenter">
                                        <a href="#" class="button medium button-style1">More</a>
                                    </footer>
                                </li>

                            </ul></div><div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" disabled="disabled" style="display: block;"></div><div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div></div><!--/ .projects-carousel -->

                </div><!--/ .work-carousel-->

            </div><!--/ .kids_bottom_content_container-->

        </div><!--/ .l-page-width-->

    </div>
    @endif

</div><!-- #kids_middle_container -->