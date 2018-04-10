@extends('layouts.main')

@section('title', __('title.pages.signup'))

@section('content')
    <div class="bg-level-2-full-width-container kids_bottom_content">
        <div class="bg-level-2-page-width-container l-page-width no-padding">
            <section class="kids_bottom_content_container">
                <div class="header_container">
                    <h1>{{ __('title.pages.register') }}</h1>
                    <ul id="breadcrumbs">
                        <li><a href="/">{{ __('menu.main.home') }}</a></li>
                        <li>{{ __('menu.main.signup') }}</li>
                    </ul>
                </div>
                <div class="entry-container">

                    {{--@include('shared._errors')--}}

                    <form method="POST" action="{{ route('users.store') }}" class="signupForm">
                        {{ csrf_field()  }}
                        <fieldset>
                            <div class="form-header"><h1>{{ __('title.pages.signup') }}</h1></div>
                            {{--<div class="row">--}}
                                {{--<label for="name">{{ trans('form.label.username', [], Session::get('language')) }} : </label>--}}
                                {{--<input type="text" name="name" class="form-control{{ $errors->has('name')?' error':'' }}" value="{{ old('name') }}" placeholder="{{ trans($errors->first('name'),['attribute'=>trans('validation.attributes.name',[],$lang)],$lang) }}">--}}
                                {{--<hint>{{ trans('form.hint.between.string',['attribute'=>trans('form.label.username', [], Session::get('language')), 'min'=>3, 'max'=>20], Session::get('language')) }}</hint>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label for="email">{{ trans('form.label.email', [], $lang) }} : </label>--}}
                                {{--<input type="text" name="email" class="form-control{{ $errors->has('email')?' error':'' }}" value="{{ $errors->has('email')?'':old('email') }}" placeholder="{{ old('email').trans($errors->first('email'),['attribute'=>trans('validation.attributes.email',[],$lang)],$lang) }}">--}}
                                {{--<hint>{{ trans('form.hint.email',[], Session::get('language')) }}</hint>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label for="password">{{ trans('form.label.password', [], Session::get('language')) }} : </label>--}}
                                {{--<input type="password" name="password" class="form-control{{ $errors->has('password')?' error':'' }}" value="{{ old('password') }}" placeholder="{{ trans($errors->first('password'),['attribute'=>trans('validation.attributes.password',[],$lang)],$lang) }}">--}}
                                {{--<hint>{{ trans('form.hint.password',['attribute'=>trans('form.label.password', [], Session::get('language')), 'min'=>3, 'max'=>20], Session::get('language')) }}</hint>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                                {{--<label for="password_confirmation">{{ trans('form.label.password_confirmation', [], Session::get('language')) }} : </label>--}}
                                {{--<input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation')?' error':'' }}" value="{{ old('password_confirmation') }}" placeholder="{{ trans($errors->first('password_confirmation'),['attribute'=>trans('validation.attributes.password_confirmation',[],$lang)],$lang) }}">--}}
                                {{--<hint>{{ trans('form.hint.confirm',['other'=>trans('form.label.password', [], Session::get('language'))], Session::get('language')) }}</hint>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<button type="submit" class="button medium button-style1" value="send" style="margin-left: 40.6%;">{{ trans('form.label.signup', [], $lang) }}</button>--}}
                            {{--</div>--}}




                            <div class="row">
                                <label for="name">{{ __('form.label.username') }} : </label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name')?' error':'' }}" value="{{ old('name') }}" placeholder="{{ $errors->first('name') }}">
                                <hint>{{ trans('form.hint.between.string',['attribute'=>__('form.label.username'),'min'=>3,'max'=>50])}}</hint>
                            </div>

                            <div class="row">
                                <label for="email">{{ __('form.label.email') }} : </label>
                                <input type="text" name="email" class="form-control{{ $errors->has('email')?' error':'' }}" value="{{ $errors->has('email')?'':old('email') }}" placeholder="{{ $errors->first('email') }}">
                                <hint>{{ trans('form.hint.email',['attribute'=>__('form.label.email')]) }}</hint>
                            </div>

                            <div class="row">
                                <label for="password">{{ __('form.label.password') }} : </label>
                                <input type="password" name="password" class="form-control{{ $errors->has('password')?' error':'' }}" value="{{ old('password') }}" placeholder="{{ $errors->first('password') }}">
                                <hint>{{ trans('form.hint.password',['attribute'=>__('form.label.password'),'min'=>6]) }}</hint>
                            </div>

                            <div class="row">
                                <label for="password_confirmation">{{ __('form.label.password_confirmation') }} : </label>
                                <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation')?' error':'' }}" value="{{ old('password_confirmation') }}" placeholder="{{ $errors->first('password_confirmation') }}">
                                <hint>{{ trans('form.hint.confirm',['other'=>__('form.label.password')]) }}</hint>
                            </div>

                            <div class="row">
                                <button type="submit" class="button medium button-style1" value="send" style="margin-left: 40.6%;">{{ __('form.label.signup') }}</button>
                            </div>
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