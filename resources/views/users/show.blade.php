@extends('layouts.main.frame')

@section('title', $user->name)


@section('content')
    <style>

        .blogs-list li {
            list-style: none;
            margin-bottom: 20px;

        }

        .blogs-list li form {
            position: relative;
            /* right: 0px; */
            float: right;
        }

        .blogs-list li .col-md img {
            width: 10%;
            border: 2px solid #E5E5E5;
            float: left;
            margin-right: 8px;
        }

        /*.blogs-list li .top-content h5 {*/
            /*font-size: 2em;*/
            /*!* padding: 0.5em; *!*/
        /*}*/
        .blogs-list li .top-content h5 a{
            font-size: 2em;
            color: #ef5b30;
            /* padding: 0.5em; */
        }

        .blogs-list li .top-content .white {
            text-align: left;
        }

        .blogs-list li .top-content .white p {
            line-height: 16px;
            margin-top: -20px;
        }
        .blogs-list li>div {
            background: #F7F7F7;
            padding: 0.5em;
            border: 1px solid #BBBBBB;
            border-radius: 5px;
            box-shadow: #BBBBBB 1px 1px 5px;
        }
        .blogs-list li div.men{
            margin:0 1% 0;
            height: 11em;
        }

        .blogs-list li .bag h9 {
            text-align: left;
            font-size: 1.1em;
            /* padding: 0.5em 61px 0.5em; */
            /* margin: 0 -1.4em; */
            display: block;
            position: relative;
            top: -34px;
            left: 11.3%;
        }

        .side-bar-items {
            width: 100%;
            margin: 2em 0;
            border: 1px solid #A6A5A5;
            text-align: center;
        }

        .side-bar-items h6 {
            text-decoration: none;
            color: #a7a49c;


            font-size: 1.2em;
            background: #F5F5F5;
            border-bottom: 1px solid #A6A5A5;
            padding: 0.8em 0;
        }

        .side-bar-items h2 {
            color: #ef5b30;
        }

        .side-bar-items .photo {
            font-size: 0.9em;
            color: #000;
            padding: 0.8em 0;
        }

        .side-bar-items .photo img{
            border-radius: 50%;
            border: 3px solid #F9F9F9;
        }

        .side-bar-items .row.user-counts > div {
            border-right: 1px solid #F9F9F9;
            margin-top: 10px;
            font-weight: 600;
            color: #737172;
        }

        .side-bar-items .row.user-counts > div:last-child {
            border-right: none;
        }
    </style>


    <div class="container {{ route_class() }}-page">
        <div class="wrapper wrapper-full">

            <div class="col-md-9">
                <h2 class="title">{{ __('pages.user.show.title') }}</h2>

                @include('shared._messages')

                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7"></div>
                </div>

                <ul  class="blogs-list">
                @foreach($blogs as $blog)
                    @include('shared._blog')
                @endforeach
                    {!! $blogs->render() !!}
                </ul>
            </div>


            <div class="col-md-3">

                <div class="side-bar-items">
                    <h6>个人简介</h6>
                    <div class="row">
                        <div class="photo">
                            <a href="{{ route('users.show', $user->id) }}">
                                <img src="{{ $user->gravatar('100') }}" alt="{{ $user->name }}" class="gravatar"/>
                                <h2>{{ $user->name }}</h2>
                            </a>
                        </div>

                    </div>
                    <div class="row user-counts">
                        <div class="col-xs-4">
                            {{ $user->followings()->count() }}<br>关注
                        </div>
                        <div class="col-xs-4">
                            {{ $user->fans()->count() }}<br>粉丝
                        </div>
                        <div class="col-xs-4">
                            {{ $user->blogs->count() }}<br>微博
                        </div>
                    </div>
                </div>

                <div class="side-bar-items">
                    <h6>{{ __('pages.blog.create.form.title') }}</h6>
                    <div class="blog-form">
                        @include('shared._errors')
                        <form action="{{ route('blogs.store') }}" method="post">
                            {{ csrf_field()  }}
                            <textarea name="content" rows="6" class="form-control"></textarea>
                            <div class="submit">
                                <input type="submit" value="{{ __('pages.blog.create.form.label.submit') }}">
                            </div>
                        </form>
                    </div>
                </div>

            </div>{{-- col-md-4 --}}
        </div>
    </div>{{-- container --}}
@stop
