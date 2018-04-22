<style>

    .feed-items li form {
        position: relative;
        /* right: 0px; */
        float: right;
    }

    .feed-items li .col-md img {
        width: 10%;
        border: 2px solid #E5E5E5;
        float: left;
        margin-right: 8px;
    }

    .feed-items li .top-content h5 {
        font-size: 1.4em;
        /* padding: 0.5em; */
    }

    .feed-items li .top-content .white {
        text-align: left;
    }

    .feed-items li .top-content .white p {
        line-height: 16px;
    }
    .feed-items li>div{
        background: #d9d9d9;
        padding: 0.5em;
        border: 1px solid #BBBBBB;
        border-radius: 5px;
    }
    .feed-items li div.men{
        margin:0 1% 0;
        height: 130px;
    }

    .feed-items li .bag h9 {
        text-align: left;
        font-size: 1.1em;
        /* padding: 0.5em 61px 0.5em; */
        /* margin: 0 -1.4em; */
        display: block;
        position: relative;
        top: -18px;
        left: 11.3%;
    }
</style>

@if (count($feed_items))

<ul class="feed-items" id="feed-items">
    {{--<ul id="feed-items">--}}
    @foreach($feed_items as $blog)
        @include('shared._blog')
    @endforeach
{{--    {!! $feed_items->render() !!}--}}
</ul>
@endif