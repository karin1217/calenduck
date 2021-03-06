@extends('layouts.main')

@section('title', $user->name)

@section('content')
    <div class="bg-level-2-full-width-container kids_bottom_content">
        <div class="bg-level-2-page-width-container l-page-width no-padding">
            <section class="kids_bottom_content_container">
                <div class="header_container">
                    <h1>{{ __('title.pages.profile') }}</h1>
                    <ul id="breadcrumbs">
                        <li><a href="/">{{ __('menu.main.home') }}</a></li>
                        <li>{{ __('title.pages.profile') }}</li>
                    </ul>
                </div>
                <div class="entry-container">

                    @include('shared._messages')

                    {{--<div style="font-family:'Sawarabi Gothic'">{{ trans('messages.welcome',[], Session::get('language')) }}</div>--}}

                    <div style="width: 80%; margin: 3px auto; text-align: center;">@include('shared._user_info')</div>


                    <div class="kids_clear"></div>
                </div><!-- .entry-container -->
            </section><!-- .bottom_content_container -->
            <div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
            <div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->
        </div>
    </div>

@stop