@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ trans($error,[],Session::get('language')) }}</li>
            @endforeach
        </ul>
    </div>
@endif