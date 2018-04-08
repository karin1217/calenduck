@extends('layouts.main')

@section('title','SignUp')

@section('content')
    <div class="bg-level-2-full-width-container kids_bottom_content">
        <div class="bg-level-2-page-width-container l-page-width no-padding">
            <section class="kids_bottom_content_container">
                <div class="header_container">
                    <h1>{{ trans('title.pages.register', [], Session::get('language')) }}</h1>
                    <ul id="breadcrumbs">
                        <li><a href="/">{{ trans('menu.main.home',[],$lang) }}</a></li>
                        <li>{{ trans('menu.main.signup',[],$lang) }}</li>
                    </ul>
                </div>
                <div class="entry-container">
                    {{--@include('shared._errors')--}}

                    <h1>{{ trans('title.pages.signup',[],Session::get('language')) }}</h1>

                    @foreach($errors as $err)
                        @php print_r(trans($err)) @endphp
                    @endforeach
                    <form method="POST" action="{{ route('users.store') }}" class="signupForm">
                        {{ csrf_field()  }}
                        <fieldset>
                            <div class="row">
                                <label for="name">{{ trans('form.label.username', [], Session::get('language')) }} : </label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name')?' error':'' }}" value="{{ old('name') }}" placeholder="{{ trans($errors->first('name'),['attribute'=>trans('validation.attributes.name',[],$lang)],$lang) }}">
                                <hint>{{ trans('form.hint.between.string',['attribute'=>trans('form.label.username', [], Session::get('language')), 'min'=>3, 'max'=>20], Session::get('language')) }}</hint>
                            </div>

                            <div class="row">
                                <label for="email">{{ trans('form.label.email', [], $lang) }} : </label>
                                <input type="text" name="email" class="form-control{{ $errors->has('email')?' error':'' }}" value="{{ $errors->has('email')?'':old('email') }}" placeholder="{{ old('email').trans($errors->first('email'),['attribute'=>trans('validation.attributes.email',[],$lang)],$lang) }}">
                                <hint>{{ trans('form.hint.email',[], Session::get('language')) }}</hint>
                            </div>

                            <div class="row">
                                <label for="password">{{ trans('form.label.password', [], Session::get('language')) }} : </label>
                                <input type="password" name="password" class="form-control{{ $errors->has('password')?' error':'' }}" value="{{ old('password') }}" placeholder="{{ trans($errors->first('password'),['attribute'=>trans('validation.attributes.password',[],$lang)],$lang) }}">
                                <hint>{{ trans('form.hint.password',['attribute'=>trans('form.label.password', [], Session::get('language')), 'min'=>3, 'max'=>20], Session::get('language')) }}</hint>
                            </div>

                            <div class="row">
                                <label for="password_confirmation">{{ trans('form.label.password_confirmation', [], Session::get('language')) }} : </label>
                                <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation')?' error':'' }}" value="{{ old('password_confirmation') }}" placeholder="{{ trans($errors->first('password_confirmation'),['attribute'=>trans('validation.attributes.password_confirmation',[],$lang)],$lang) }}">
                                <hint>{{ trans('form.hint.confirm',['other'=>trans('form.label.password', [], Session::get('language'))], Session::get('language')) }}</hint>
                            </div>
                            <div class="row">
                                <button type="submit" class="button medium button-style1" value="send" style="margin-left: 40.6%;">send</button>
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