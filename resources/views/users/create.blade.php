@extends('layouts.main.frame')

@section('title', __('pages.user.create.title'))

@section('content')
    <style>
        hint {
            color: #BFBFBF;
        }
    </style>
    <div class="container">
        <div class="wrapper">
            <h2 class="title">{{ __('pages.user.create.title') }}</h2>

            <div class="panel panel-info form-panel">
                <div class="panel-heading">{{ __('pages.user.create.title') }}</div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('users.store') }}" class="signupForm">
                        {{ csrf_field()  }}

                        <div>
                            <label for="name">{{ __('form.label.username') }} : </label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name')?' error':'' }}" value="{{ $errors->has('name')?'':old('name') }}" placeholder="{{ $errors->first('name') }}">
                            <hint>{{ trans('form.hint.between.string',['attribute'=>__('form.label.username'),'min'=>3,'max'=>50])}}</hint>
                        </div>

                        <div>
                            <label for="email">{{ __('form.label.email') }} : </label>
                            <input type="text" name="email" class="form-control{{ $errors->has('email')?' error':'' }}" value="{{ $errors->has('email')?'':old('email') }}" placeholder="{{ $errors->first('email') }}">
                            <hint>{{ trans('form.hint.email',['attribute'=>__('form.label.email')]) }}</hint>
                        </div>

                        <div>
                            <label for="password">{{ __('form.label.password') }} : </label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password')?' error':'' }}" value="{{ old('password') }}" placeholder="{{ $errors->first('password') }}">
                            <hint>{{ trans('form.hint.password',['attribute'=>__('form.label.password'),'min'=>6]) }}</hint>
                        </div>

                        <div>
                            <label for="password_confirmation">{{ __('form.label.password_confirmation') }} : </label>
                            <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation')?' error':'' }}" value="{{ old('password_confirmation') }}" placeholder="{{ $errors->first('password_confirmation') }}">
                            <hint>{{ trans('form.hint.confirm',['other'=>__('form.label.password')]) }}</hint>
                        </div>

                        <div class="submit">
                            <input type="submit" value="{{ __('pages.user.create.title') }}">
                        </div>
                    </form>
                </div>
                {{--<div class="panel-footer"><a href="{{ route('signup') }}">{{ __('pages.session.create.form.label.sign_up_link') }}</a></div>--}}
            </div>

        </div>
    </div>
@stop