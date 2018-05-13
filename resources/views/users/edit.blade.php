@extends('layouts.main.frame')

@section('title', __('pages.user.edit.title'))

@section('content')
    <style>
        .userEditForm .row {
            /*text-align: center;*/
        }

        .userEditForm textarea {
            resize: none;
        }

        .userEditForm .back-layer:hover .over-layer {
            display: block;
        }

        .userEditForm .avatar {
            max-width: 200px;
            max-height: 200px;
            margin: 0 auto;
            position: relative;
            /*border: 1px solid;*/

        }
        .userEditForm .avatar a{
            text-decoration: none;
        }

        .userEditForm .gravatar {
            max-width: 100%;
        }

        .userEditForm .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 0;
            line-height: 1.6;
            background-color: #f5f8fa;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: border 0.2s ease-in-out;
            transition: border 0.2s ease-in-out;
        }

        .over-layer {
            background: rgba(0, 0, 0, 0.52);
            position: relative;
            top: -201px;
            display: none;
            max-width: 201px;
            height: 201px;
            padding: 5em 0 0;
            border-radius: 4px;

            /*left: 156px;*/
        }

        .over-layer span{
            background: rgb(238,238,238);
            background: -moz-linear-gradient(top, rgba(238,238,238,1) 46%, rgba(208,208,208,1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(46%,rgba(238,238,238,1)), color-stop(100%,rgba(208,208,208,1)));
            background: -webkit-linear-gradient(top, rgba(238,238,238,1) 46%,rgba(208,208,208,1) 100%);
            background: -o-linear-gradient(top, rgba(238,238,238,1) 46%,rgba(208,208,208,1) 100%);
            background: -ms-linear-gradient(top, rgba(238,238,238,1) 46%,rgba(208,208,208,1) 100%);
            background: linear-gradient(to bottom, rgba(238,238,238,1) 46%,rgba(208,208,208,1) 100%);
            color: #747272;
            font-size: 1em;
            padding: 0.5em 0;
            display: block;
            width: 66%;
            margin: 0 auto 1em;
            text-align: center;
            border-radius: 5px;
            font-weight: 600;
            line-height: 1.4em;
        }
        .over-layer span:hover{
            background: rgb(252,94,53);
            background: -moz-linear-gradient(top, rgba(252,94,53,1) 55%, rgba(252,94,53,1) 55%, rgba(233,71,34,1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(55%,rgba(252,94,53,1)), color-stop(55%,rgba(252,94,53,1)), color-stop(100%,rgba(233,71,34,1)));
            background: -webkit-linear-gradient(top, rgba(252,94,53,1) 55%,rgba(252,94,53,1) 55%,rgba(233,71,34,1) 100%);
            background: -o-linear-gradient(top, rgba(252,94,53,1) 55%,rgba(252,94,53,1) 55%,rgba(233,71,34,1) 100%);
            background: -ms-linear-gradient(top, rgba(252,94,53,1) 55%,rgba(252,94,53,1) 55%,rgba(233,71,34,1) 100%);
            background: linear-gradient(to bottom, rgba(252,94,53,1) 55%,rgba(252,94,53,1) 55%,rgba(233,71,34,1) 100%);
            color: #fff;
        }



        /*
	Uploader:
	- These styles are the ones used on the examples. No needed to use it by any means.
	- It disables user selection to avoid some weird visuals in some browsers
	- It masks/hides the the file input behind a button
 */

        .dm-uploader {
            cursor: default;

            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .dm-uploader .btn {
            position: relative;
            overflow: hidden;
        }

        .dm-uploader .btn input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            border: solid transparent;
            width: 100%;
            height: 100%;
            opacity: .0;
            filter: alpha(opacity= 0);
            cursor: pointer;
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }
        form.dm-uploader {
            border: solid #f7f7f9 !important;
            padding: 1.5rem;
        }

        .form-row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }

        form .progress {
            height: 38px;
        }

        .progress {
            height: 1.5rem;
        }
        .mb-2, .my-2 {
            margin-bottom: .5rem!important;
        }
        .d-none {
            display: none!important;
        }
        .progress {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: .25rem;
        }
        .progress-bar {
            /*float: left;*/
            /*width: 0%;*/
            /*height: 100%;*/
            /*font-size: 12px;*/
            line-height: 38px;
        }
        .img-thumbnail {
            padding: .25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            max-width: 100%;
            height: auto;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }
        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0,0,0,.03);
            border-bottom: 1px solid rgba(0,0,0,.125);
        }






        .btn {
            padding-left: .75rem;
            padding-right: .75rem;
        }

        label.btn {
            margin-bottom: 0;
        }

        .d-flex > .btn {
            flex: 1;
        }

        .carbonads {
            border-radius: .25rem;
            border: 1px solid #ccc;
            font-size: .875rem;
            overflow: hidden;
            padding: 1rem;
        }

        .carbon-wrap {
            overflow: hidden;
        }

        .carbon-img {
            clear: left;
            display: block;
            float: left;
        }

        .carbon-text,
        .carbon-poweredby {
            display: block;
            margin-left: 140px;
        }

        .carbon-text,
        .carbon-text:hover,
        .carbon-text:focus {
            color: #fff;
            text-decoration: none;
        }

        .carbon-poweredby,
        .carbon-poweredby:hover,
        .carbon-poweredby:focus {
            color: #ddd;
            text-decoration: none;
        }

        @media (min-width: 768px) {
            .carbonads {
                float: right;
                margin-bottom: -1rem;
                margin-top: -1rem;
                max-width: 360px;
            }
        }

        .footer {
            font-size: .875rem;
            overflow: hidden;
        }

        .heart {
            color: #ddd;
            display: block;
            height: 2rem;
            line-height: 2rem;
            margin-bottom: 0;
            margin-top: 1rem;
            position: relative;
            text-align: center;
            width: 100%;
        }

        .heart:hover {
            color: #ff4136;
        }

        .heart::before {
            border-top: 1px solid #eee;
            content: " ";
            display: block;
            height: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 50%;
        }

        .heart::after {
            background-color: #fff;
            content: "♥";
            padding-left: .5rem;
            padding-right: .5rem;
            position: relative;
            z-index: 1;
        }

        .img-container,
        .img-preview {
            background-color: #f7f7f7;
            text-align: center;
            width: 100%;
        }

        .img-container {
            margin-bottom: 1rem;
            max-height: 497px;
            min-height: 200px;
        }

        @media (min-width: 768px) {
            .img-container {
                min-height: 497px;
            }
        }

        .img-container > img {
            max-width: 100%;
        }

        .docs-preview {
            margin-right: -1rem;
        }

        .img-preview {
            float: left;
            margin-bottom: .5rem;
            margin-right: .5rem;
            overflow: hidden;
        }

        .img-preview > img {
            max-width: 100%;
        }

        .preview-lg {
            height: 9rem;
            width: 16rem;
        }

        .preview-md {
            height: 4.5rem;
            width: 8rem;
        }

        .preview-sm {
            height: 2.25rem;
            width: 4rem;
        }

        .preview-xs {
            height: 1.125rem;
            margin-right: 0;
            width: 2rem;
        }

        .docs-data > .input-group {
            margin-bottom: .5rem;
        }

        .docs-data .input-group-prepend .input-group-text {
            min-width: 4rem;
        }

        .docs-data .input-group-append .input-group-text {
            min-width: 3rem;
        }

        .docs-buttons > .btn,
        .docs-buttons > .btn-group,
        .docs-buttons > .form-control {
            margin-bottom: .5rem;
            margin-right: .25rem;
        }

        .docs-toggles > .btn,
        .docs-toggles > .btn-group,
        .docs-toggles > .dropdown {
            margin-bottom: .5rem;
            margin-top: .5rem;

        }

        .docs-tooltip {
            display: block;
            margin: -.5rem -.75rem;
            padding: .5rem .75rem;
        }

        .docs-tooltip > .icon {
            margin: 0 -.25rem;
            vertical-align: top;
        }

        .tooltip-inner {
            white-space: normal;
        }

        .btn-upload .tooltip-inner,
        .btn-toggle .tooltip-inner {
            /*white-space: nowrap;*/
        }

        .btn-toggle {
            padding: .5rem;
        }

        .btn-toggle > .docs-tooltip {
            /*margin: -.5rem;*/
            /*padding: .5rem;*/
        }

        @media (max-width: 400px) {
            .btn-group-crop {
                margin-right: -1rem!important;
            }

            .btn-group-crop > .btn {
                padding-left: .5rem;
                padding-right: .5rem;
            }

            .btn-group-crop .docs-tooltip {
                margin-left: -.5rem;
                margin-right: -.5rem;
                padding-left: .5rem;
                padding-right: .5rem;
            }
        }

        .docs-options .dropdown-menu {
            width: 100%;
        }

        .docs-options .dropdown-menu > li {
            font-size: .875rem;
            padding: .125rem 1rem;
        }

        .docs-options .dropdown-menu .form-check-label {
            display: block;
        }

        .docs-cropped .modal-body {
            text-align: center;
        }

        .docs-cropped .modal-body > img,
        .docs-cropped .modal-body > canvas {
            max-width: 100%;
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .cropper-container {
            width: 100%;
            height: 500px;
        }

        img {
            max-width: 100%;
        }

    </style>
    <div class="wrapper">
        @include('shared._errors')
        <h2 class="title">{{ __('pages.user.edit.title') }}</h2>

        <div class="panel panel-info form-panel">
            <div class="panel-heading">{{ __('pages.user.edit.title') }}</div>
            <div class="panel-body">

                <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="userEditForm">
                    {{ csrf_field()  }}
                    {{ method_field('PATCH') }}

                    <div class="row">
                        <div class="avatar">
                            <a href="http://gravatar.com/emails" target="_blank" class="back-layer">
                                <img src="{{ $user->avatar ? config('app.url').'/'.$user->avatar : $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar thumbnail"/>
                                <div class="over-layer">
                                    <span id="change-avatar">更改头像</span>
                                    <span id="edit-avatar">编缉头像</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div>
                        <label for="name">{{ __('pages.user.edit.form.label.username') }} : </label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name')?' error':'' }}" value="{{ $errors->has('name')?'':$user->name }}" placeholder="{{ $errors->first('name') }}">
                    </div>

                    <div>
                        <label for="email">{{ __('pages.user.edit.form.label.email') }} : </label>
                        <input type="text" name="email" class="form-control{{ $errors->has('email')?' error':'' }}" value="{{ $errors->has('email')?'':$user->email }}" placeholder="{{ $errors->first('email') }}">
                    </div>

                    <div>
                        <label for="introduction">{{ __('pages.user.edit.form.label.introduction') }} : </label>
                        <textarea name="introduction" rows="6" class="form-control{{ $errors->has('introduction')?' error':'' }}" placeholder="{{ $errors->first('introduction') }}">{{ $errors->has('introduction')?'':$user->introduction }}</textarea>
                    </div>

                    <div class="submit">
                        <input type="submit" value="{{ __('pages.user.edit.form.label.update') }}" >
                    </div>
                </form>
            </div>{{-- /panel-body --}}
        </div>{{-- /panel --}}
    </div>

    @include('shared.image._upload')
    @include('shared.image._crop')
@stop