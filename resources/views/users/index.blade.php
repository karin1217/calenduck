@extends('layouts.main')

@section('title', __('pages.user.index.title'))

@section('content')
    <div class="bg-level-2-full-width-container kids_bottom_content">
        <div class="bg-level-2-page-width-container l-page-width no-padding">
            <section class="kids_bottom_content_container">
                <div class="header_container">
                    <h1>{{ __('pages.user.index.title') }}</h1>
                    <ul id="breadcrumbs">
                        <li><a href="/">{{ __('pages.home.title') }}</a></li>
                        <li>{{ __('pages.user.index.title') }}</li>
                    </ul>
                </div>
                <div class="entry-container">

                    @include('shared._messages')
                    <h1>{{ __('pages.user.index.title') }}</h1>

                    <ul class="users">
                        @foreach ($users as $user)
                            <li>
                                <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
                                <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>

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



                    <div class="kids_clear"></div>
                </div><!-- .entry-container -->
            </section><!-- .bottom_content_container -->
            <div class="bg-level-2-left" id="bg-level-2-left"></div> <!-- .left_patterns -->
            <div class="bg-level-2-right" id="bg-level-2-right"></div><!-- .right_patterns -->
        </div>
    </div>
@stop