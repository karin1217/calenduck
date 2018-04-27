@extends('layouts.main.frame')

@section('title', __('pages.user.edit.title'))

@section('content')
    <style>
        .userEditForm .row {
            text-align: center;
        }

        .userEditForm textarea {
            resize: none;
        }
    </style>
    <div class="wrapper">
        @include('shared._errors')
        <h2 class="title">{{ __('pages.user.edit.title') }}</h2>

        <div class="panel panel-info form-panel">
            <div class="panel-heading">{{ __('pages.user.edit.title') }}</div>
            <div class="panel-body">

                <form method="POST" action="{{ route('users.update', $user->id) }}" class="userEditForm">
                    {{ csrf_field()  }}
                    {{ method_field('PATCH') }}

                    <div class="row">
                        <a href="http://gravatar.com/emails" target="_blank">
                            <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar"/>
                        </a>
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
            </div>
        </div>
    </div>
@stop