@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('dashboard.title')}}</div>

                    <div class="panel-body">
                        <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr')}}" class="btn btn-sq-lg btn-primary">
                            <i class="fa fa-user fa-5x"></i><br/>
                            Exam monitoring
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
