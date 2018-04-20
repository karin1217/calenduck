@extends('layouts.main.frame')

@section('title', $user->name)


@section('content')
    <div class="container">
        <div class="wrapper">
            <h2 class="title">{{ __('pages.user.show.title') }}</h2>

            @include('shared._messages')

            {{--<div style="font-family:'Sawarabi Gothic'">{{ trans('messages.welcome',[], Session::get('language')) }}</div>--}}

            <div style="width: 80%; margin: 3px auto; text-align: center;">@include('shared._user_info')</div>
        </div>
    </div>
@stop
