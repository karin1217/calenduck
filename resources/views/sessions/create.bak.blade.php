@extends('layouts.main')

@section('title', __('pages.session.create.title'))

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

                    {{--@include('shared._errors')--}}

                    @include('shared._messages')

                    {{--<div style="font-family:'Sawarabi Gothic'">{{ App::getLocale() }}</div>--}}


                        <form method="POST" action="{{ route('login') }}" class="loginForm">

                            {{ csrf_field()  }}
                            <fieldset>
                                <div class="form-header"><h1>{{ __('pages.session.create.title') }}</h1></div>

                                <div class="row">
                                    <label for="email">{{ __('pages.session.create.form.label.email') }} : </label>
                                    <input type="text" name="email" class="form-control{{ $errors->has('email')?' error':'' }}" value="{{ $errors->has('email')?'':old('email') }}" placeholder="{{ $errors->first('email') }}">
                                </div>

                                <div class="row">
                                    <label for="password">{{ __('pages.session.create.form.label.password') }} (<a href="{{ route('password.request') }}">{{ __('pages.session.create.form.label.forgot') }})</a> : </label>
                                    <input type="password" name="password" class="form-control{{ $errors->has('password')?' error':'' }}" value="" placeholder="{{ $errors->first('password') }}">
                                </div>

                                <div class="row">
                                    <input type="checkbox" name="remember"><label for="remember" style="left: 20px;position: relative;top: -26px;"> {{ __('pages.session.create.form.label.remember') }}</label>
                                </div>


                                <div class="row">
                                    <button type="submit" class="button medium button-style1" value="send" style="margin-left: 40.6%;">{{ __('pages.session.create.title') }}</button>
                                </div>

                                <p><a href="{{ route('signup') }}">{{ __('pages.session.create.form.label.sign_up_link') }}</a></p>
                            </fieldset>
                        </form>

                    <div class="kids_clear"></div>
                </div><!-- .entry-container -->
            </section><!-- .bottom_content_container -->
            <div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
            <div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->
        </div>
    </div>
@stop