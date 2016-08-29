@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('regform.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-9">
                                <a href="{{LaravelLocalization::getLocalizedURL(null,'/form/emr')}}" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Exams Monitoring</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection