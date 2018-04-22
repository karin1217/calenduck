<li>
    <div class="col-md men">
        <div class="top-content bag">
            @can('destroy', $blog)
            <form action="{{ route('blogs.destroy', $blog->id) }}" method="post">
                <button type="submit" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">DELETE</button>
            </form>
            @endcan

            <img src="{{ $blog->user->gravatar(30) }}" />
            <h5><a href="{{ route('users.show', [$blog->user->id]) }}">{{ $blog->user->name }}</a></h5><br/>
            <h9>{{ $blog->created_at }}</h9>
            <div class="white">
                <p>{{ mb_substr($blog->content, 0, 60) }}</p>
                {{--<div class="clearfix"></div>--}}
            </div>
        </div>
    </div>
</li>