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

        .blogs-list li .top-content h5 {
            font-size: 1.4em;
            /* padding: 0.5em; */
        }

        .blogs-list li .top-content .white {
            text-align: left;
        }

        .blogs-list li .top-content .white p {
            line-height: 16px;
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
            top: -18px;
            /*left: 11.3%;*/
        }
    </style>


    <div class="container">
        <div class="wrapper">
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



            <div class="blog-form">
                <h6>{{ __('pages.blog.create.form.title') }}</h6>
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
    </div>
@stop
