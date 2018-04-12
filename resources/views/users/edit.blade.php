@extends('layouts.main')

@section('title', __('pages.user.edit.title'))

@section('content')
    <div class="bg-level-2-full-width-container kids_bottom_content">
        <div class="bg-level-2-page-width-container l-page-width no-padding">
            <section class="kids_bottom_content_container">
                <div class="header_container">
                    <h1>{{ __('pages.user.edit.title') }}</h1>
                    <ul id="breadcrumbs">
                        <li><a href="/">{{ __('pages.home.title') }}</a></li>
                        <li><a href="{{ route('users.show', [$user]) }}">{{ __('pages.user.show.title') }}</a></li>
                        <li>{{ __('pages.user.edit.title') }}</li>
                    </ul>
                </div>
                <div class="entry-container">

                    {{--@include('shared._errors')--}}



                    <form method="POST" action="{{ route('users.update', $user->id) }}" class="userEditForm">
                        {{ csrf_field()  }}
                        {{ method_field('PATCH') }}
                        <fieldset>
                            <div class="form-header"><h1>{{ __('pages.user.edit.title') }}</h1></div>

                            <div class="gravatar_edit">
                                <a href="http://gravatar.com/emails" target="_blank">
                                    <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar"/>
                                </a>
                            </div>

                            <div class="row">
                                <label for="name">{{ __('pages.user.edit.form.label.username') }} : </label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name')?' error':'' }}" value="{{ $errors->has('name')?'':$user->name }}" placeholder="{{ $errors->first('name') }}">
                            </div>

                            <div class="row">
                                <label for="email">{{ __('pages.user.edit.form.label.email') }} : </label>
                                <input type="text" name="email" class="form-control{{ $errors->has('email')?' error':'' }}" value="{{ $errors->has('email')?'':$user->email }}" placeholder="{{ $errors->first('email') }}" disabled>
                            </div>

                            <div class="row">
                                <label for="password">{{ __('pages.user.edit.form.label.password') }} : </label>
                                <input type="password" name="password" class="form-control{{ $errors->has('password')?' error':'' }}" value="{{ $errors->has('password')?'':old('password') }}" placeholder="{{ $errors->first('password') }}">
                            </div>

                            <div class="row">
                                <label for="password_confirmation">{{ __('pages.user.edit.form.label.password_confirmation') }} : </label>
                                <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation')?' error':'' }}" value="{{ $errors->has('password_confirmation')?'':old('password_confirmation') }}" placeholder="{{ $errors->first('password_confirmation') }}">
                            </div>

                            <div class="row">
                                <button type="submit" class="button medium button-style1" value="send" style="margin-left: 40.6%;">{{ __('pages.user.edit.form.label.update') }}</button>
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