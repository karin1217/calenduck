@extends('layouts.main.frame')

@section('title', __('pages.user.index.title'))

@section('content')
    <style>
        .kids_bottom_content_container #breadcrumbs li {
            float: left;
            padding-left: 14px;
            background: url(/images/breadcrumb_bg.png) no-repeat 3px 65% transparent;
        }

        .users {
            width: 60%;
            margin: 0 auto;
            border: solid 1px #DFDFDF;
            padding: 5px;
        }

        .users li {
            list-style: none;
            line-height: 2em;
            margin-bottom: 10px;
            border-bottom: solid 1px #DFDFDF ;
            padding: 5px;
        }

        .users li .gravatar {
            border-radius: 50%;
            width: 50px;
        }

        .users li:last-child {
            margin-bottom: 0;
            border-bottom: none;
        }

        .users li > form {
            display: inline-block;
            float: right;
            margin-top: 1%;
        }

        ul.pagination {
            width: 47%;
            float: right;
        }
    </style>
    <div class="container {{ route_class() }}-page">
        <div class="wrapper">
            <h2 class="title">{{ __('pages.user.index.title') }}</h2>

            @include('shared._messages')

            {{--<div style="font-family:'Sawarabi Gothic'">{{ trans('messages.welcome',[], Session::get('language')) }}</div>--}}
            <ul class="users">
                @foreach ($users as $user)
                    <li>
                        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
                        <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>

                        @can('follow', $user)
                            @if(Auth::user()->isFollowing($user->id))
                                <form action="{{ route('followers.destroy', $user->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">取消关注</button>
                                </form>
                            @else
                                <form action="{{ route('followers.store', $user->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">关注</button>
                                </form>
                            @endif
                        @endcan

                        @can('destroy', $user)
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
                            </form>
                        @endcan
                    </li>
                @endforeach
            </ul>

            {!! $users->render() !!}

        </div>
    </div>
    {{--<div class="bg-level-2-full-width-container kids_bottom_content">--}}
        {{--<div class="bg-level-2-page-width-container l-page-width no-padding">--}}
            {{--<section class="kids_bottom_content_container">--}}
                {{--<div class="header_container">--}}
                    {{--<h1>{{ __('pages.user.index.title') }}</h1>--}}
                    {{--<ul id="breadcrumbs">--}}
                        {{--<li><a href="/">{{ __('pages.home.title') }}</a></li>--}}
                        {{--<li>{{ __('pages.user.index.title') }}</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="entry-container">--}}

                    {{--@include('shared._messages')--}}
                    {{--<h1>{{ __('pages.user.index.title') }}</h1>--}}

                    {{--<ul class="users">--}}
                        {{--@foreach ($users as $user)--}}
                            {{--<li>--}}
                                {{--<img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>--}}
                                {{--<a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>--}}

                                {{--@can('destroy', $user)--}}
                                    {{--<form action="{{ route('users.destroy', $user->id) }}" method="post">--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--{{ method_field('DELETE') }}--}}
                                        {{--<button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>--}}
                                    {{--</form>--}}
                                {{--@endcan--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}

                    {{--{!! $users->render() !!}--}}



                    {{--<div class="kids_clear"></div>--}}
                {{--</div><!-- .entry-container -->--}}
            {{--</section><!-- .bottom_content_container -->--}}
            {{--<div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->--}}
            {{--<div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->--}}
        {{--</div>--}}
    {{--</div>--}}
@stop