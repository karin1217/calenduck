@extends('layouts.main.frame')

@section('content')
<div class="container">
    <div class="wrapper">
        <h2 class="title">{{ __('pages.session.create.title') }}</h2>

        <div class="panel panel-info form-panel">
            <div class="panel-heading">{{ __('pages.session.create.title') }}</div>
            <div class="panel-body">
                <form method="POST" action="{{ route('login') }}" class="loginForm">
                    {{ csrf_field()  }}

                    <div>
                        <span class="email">{{ __('pages.session.create.form.label.email') }}*</span>
                        <input type="text" name="email" class="form-control{{ $errors->has('email')?' error':'' }}" value="{{ $errors->has('email')?'':old('email') }}" placeholder="{{ $errors->first('email') }}">
                    </div>

                    <div>
                        <span class="word">{{ __('pages.session.create.form.label.password') }}* (<a href="{{ route('password.request') }}">{{ __('pages.session.create.form.label.forgot') }}</a>) </span>
                        <input type="password" name="password" class="form-control{{ $errors->has('password')?' error':'' }}" value="" placeholder="{{ $errors->first('password') }}">
                    </div>

                    {{--<div>--}}
                        {{--<span class="captcha">{{ __('pages.session.create.form.label.captcha') }}*</span>--}}
                        {{--<input id="captcha" class="form-control{{ $errors->has('captcha')?' error':'' }}" name="captcha" value="" placeholder="{{ $errors->first('captcha') }}" >--}}
                        {{--<img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">--}}
                    {{--</div>--}}

                    <div>
                        <input type="checkbox" name="remember"><label for="remember" style="left: 10px;position: relative;"> {{ __('pages.session.create.form.label.remember') }}</label>
                    </div>


                    <div class="submit">
                        <input type="submit" value="{{ __('pages.session.create.title') }}">
                    </div>


                </form>
            </div>
            <div class="panel-footer"><a href="{{ route('signup') }}">{{ __('pages.session.create.form.label.sign_up_link') }}</a></div>
        </div>

    </div>
</div>
@stop