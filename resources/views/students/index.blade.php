@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('students.applicants')}}</div>

                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{LaravelLocalization::getLocalizedURL(null,'/students/conflict')}}" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>تقديم تعارض</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection