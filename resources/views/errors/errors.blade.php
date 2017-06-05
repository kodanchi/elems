@if(count($errors) > 0)
{{--    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach

    </ul>--}}

<div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <p>
            {{ $error }}
        </p>


    @endforeach</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif