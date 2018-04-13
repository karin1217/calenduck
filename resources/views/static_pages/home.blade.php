@extends('layouts.main')
@section('title', '主页')

@section('content')
    <div class="bg-level-2-full-width-container kids_bottom_content">
        <div class="bg-level-2-page-width-container l-page-width no-padding">
            <section class="kids_bottom_content_container">
                <div class="header_container">
                    <h1>{{ __('pages.session.create.title') }}</h1>
                    <ul id="breadcrumbs">
                        <li><a href="/">{{ __('pages.home.title') }}</a></li>
                        <li>{{ __('pages.session.create.title') }}</li>
                    </ul>
                </div>
                <div class="entry-container">


                    {{--@include('shared._messages')--}}


                    <div id='calendar'></div>

                    {{--<div class="kids_clear"></div>--}}
                </div><!-- .entry-container -->
            </section><!-- .bottom_content_container -->
            <div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
            <div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->
        </div>
    </div>
@stop