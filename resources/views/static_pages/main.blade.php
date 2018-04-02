@extends('layouts.main')

@section('title','MAIN')

@section('content')
    <div class="bg-level-2-page-width-container l-page-width">

        <div class="kids_slider_bg">

            <div class="kids_slider_wrapper">

                <div class="kids_slider_inner_wrapper">

                    <div id="kids-slider" class="nivoSlider">
                        <img alt="sample_1" src="/images/sample_1.jpg" />
                        <img alt="sample_2" src="/images/sample_2.jpg" />
                        <img alt="sample_3" src="/images/sample_3.jpg" />
                        <img alt="sample_4" src="/images/sample_4.jpg" />
                        <img alt="sample_5" src="/images/sample_5.jpg" />
                        <img alt="sample_6" src="/images/sample_6.jpg" />
                        <img alt="sample_7" src="/images/toystory.jpg" data-thumb="/demo/images/toystory.jpg"/>
                    </div><!--/ #kids-slider-->

                </div><!--/ .kids_slider_inner_wrapper-->

            </div><!--/ .kids_slider_wrapper-->

        </div><!--/ .kids_slider_bg-->

        <div class="bg-level-2-left" id="bg-level-2-left"></div>
        <div class="bg-level-2-right" id="bg-level-2-right"></div>

    </div><!-- .l-page-width -->
@stop