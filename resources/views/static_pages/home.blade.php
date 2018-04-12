@extends('layouts.main')
@section('title', '主页')

@section('content')
    <div class="row-fluid" style="height: 300px;">
        <h1>HOME PAGE</h1>

        @include('shared._messages')
        <div id='calendar'></div>
        {{--<div id="calendar-x"></div>--}}

    </div>
@stop